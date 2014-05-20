(function() {
    $form = $('#frm-editor-form');
    if (!$form.length) {
        return;
    }

    var Renderer = {};
    Renderer.saveHook = function(def, $input, map) {
        var serialize = function() {
            for (var k in map) {
                def[k] = map[k].val();
            }
            $input.val(JSON.stringify(def));
        };
        for (var k in map) {
            map[k].on('change', serialize);
        }
        serialize();
    };
    Renderer.render = function(def, $input) {
        var $group = $('<div></div>')
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

        Renderer.saveHook(def, $input, {
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
        Renderer.saveHook(def, $input, inputs);
    };
    Renderer.renderList = function(def, $group, $input) {
        var inputs = {};
        for (var i in def.list) {
            inputs[i] = $('<input class="form-control">').val(def.list[i]);
            $group.append(inputs[i]);

            var serialize = function() {
                def.list = [];
                for (var i in inputs) {
                    def.list.push(inputs[i].val());
                }
                $input.val(JSON.stringify(def));
            };
            inputs[i].on('change', serialize);
            serialize();
        }
        $input.val(JSON.stringify(def));
    };

    $form.find('[data-definition]').each(function(i, input) {
        var def = JSON.parse($(input).val());
        Renderer.render(def, $(input));
    });

    var $container = $form.find('[data-definitions]');
    $form.find('[data-add-type]').on('click', function() {
        var type = $(this).data('add-type');
        var id = $container.find('[data-definition]').length;
        var $name = $('<input name="vars[' + id + '][name]" class="form-control">');
        var $input = $('<input name="vars[' + id + '][definition]" data-definition class="form-control">');
        $container.append($name).append($input);

        var defaults = {type: type};
        if (type === 'integer') {
            defaults.min = 0;
            defaults.max = 100;

        } else if (type === 'list') {
            defaults.list = [];

        } else if (type === 'plural') {
            defaults = {
                type: type,
                count: '<eval></eval>',
                one: '',
                few: '',
                many: ''
            };
        }
        Renderer.render(defaults, $input);
    });

    var $undo;
    var $pointer;
    var $undoLink;
    $container.find('[data-var-remove]').click(function(e) {
        if ($undoLink) {
            $undoLink.remove();
        }

        var $link = $(e.target);
        var $group = $container.find('[data-var-id="' + $link.data('var-remove') + '"]');
        $pointer = $('<div></div>');
        $group.after($pointer);
        $undoLink = $('<a class="btn btn-link"></a>').text($link.data('label-undo'))
            .on('click', function() {
                $pointer.after($undo);
                $pointer.remove();
                $undoLink.remove();
            });

        $group.after($undoLink);
        $group.detach();
        $undo = $group;
    });
})();
