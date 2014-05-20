(function() {
    $form = $('#frm-editor-form');
    if (!$form.length) {
        return;
    }

    var Renderer = {};
    Renderer.update = function(def, $input, map) {
        var serialize = function() {
            for (var k in map) {
                def[k] = map[k].val();
            }
            $input.val(JSON.stringify(def));
        };
        for (var k in map) {
            map[k].on('change', serialize);
        }
    };
    Renderer.render = function(def, $input) {
        var $group = $('<div style="border:1px solid red"></div>')
            .text('type: ' + def.type);
        $input.hide();
        $input.after($group);

        var method = 'render' + def.type.charAt(0).toUpperCase() + def.type.slice(1);
        Renderer[method](def, $group, $input);
    };
    Renderer.renderInteger = function(def, $group, $input) {
        var $min = $('<input type="number" class="form-control">').val(def.min);
        var $max = $('<input type="number" class="form-control">').val(def.max);
        $group.append($min).append($max);

        Renderer.update(def, $input, {
            'min': $min,
            'max': $max
        });
    };
    Renderer.renderPlural = function(def, $group, $input) {
        var inputs = {};
        var keys = ['count', 'one', 'few', 'many'];
        for (var name in keys) {
            var key = keys[name];
            inputs[key] = $('<input class="form-control">').val(def[key]);
            $group.append(inputs[key]);
        }
        Renderer.update(def, $input, inputs);
    };
    Renderer.renderList = function(def, $group, $input) {
        var inputs = {};
        for (var i in def.list) {
            inputs[i] = $('<input class="form-control">').val(def.list[i]);
            $group.append(inputs[i]);

            inputs[i].on('change', function() {
                def.list = [];
                for (var i in inputs) {
                    def.list.push(inputs[i].val());
                }
                $input.val(JSON.stringify(def));
            })
        }
        $input.val(JSON.stringify(def));
    };

    $form.find('[data-definition]').each(function(i, input) {
        var def = JSON.parse($(input).val());
        Renderer.render(def, $(input));
    });
})();
