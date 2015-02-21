$(function() {
    var $form = $('[data-blueprint-editor]');
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
	Renderer.label = function(type) {
		switch (type) {
            case 'table':
                return 'tabulka';
			case 'integer':
				return 'celé číslo';
			case 'list':
				return 'náhodné slovo';
			case 'plural':
				return 'plurál';
		}
	};
    Renderer.render = function(def, $input) {
	    var $varType = $('<span/>').addClass('variable-type').text(this.label(def.type));
        var $group = $('<div/>').addClass('variable-options');
        $input.hide();
	    $input.before($varType);
        $input.parent().append($group);

        var method = 'render' + def.type.charAt(0).toUpperCase() + def.type.slice(1);
	    Renderer[method](def, $group, $input);
    };
    var tableId = 0;
    Renderer.renderTable = function(def, $group, $input) {
        var $name = $group.parent().find('[name$="[name]"]');
        $name.val('table' + tableId++);
        $name.hide();

        var $table = $('<div/>');
        $group.append($table);
        var table = new Handsontable($table[0], {
            data: def.data || [["", ""], ["", ""]],
            minSpareRows: 1,
            colHeaders: false,
            contextMenu: true,
            afterChange: function(changes, source) {
                var data = $.extend({}, this.getData());
                for (var i = 0; i < data.length; i++) {
                    var empty = true;
                    for (var val in data[i])
                    {
                        if (data[i][val]) {
                            empty = false;
                            break;
                        }
                    }
                    if (empty) {
                        data.splice(i, 1);
                        i--;
                    }
                }
                def.data = data;
                $input.val(JSON.stringify(def));
            }
        });
    };
    Renderer.renderInteger = function(def, $group, $input) {
        var $min = $('<input class="form-control">').val(def.min);
        var $max = $('<input class="form-control">').val(def.max);
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
	    var list = def.list; // prevent weird race condition
	    list.push("");
	    var inputs = {};
        for (var i in list) {
            inputs[i] = $('<input class="form-control">').val(list[i]);
            $group.append(inputs[i]);

            var serialize = function() {
                def.list = [];
                for (var i in inputs) {
	                var val = inputs[i].val().trim();
	                if (val) {
		                def.list.push(val);
	                }
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


	$form.find('textarea').each(function() {
        CodeMirror.fromTextArea($(this)[0], {
            mode: "xml",
            lineNumbers: true,
            theme: "solarized",
            htmlMode: true,
            autoCloseTags: true,
            extraKeys: {
                "Ctrl-E": function(cm) {
                    cm.replaceSelection("<eval>" + cm.getSelection() + "</eval>");
                },
                "Ctrl-L": function(cm) {
                    cm.replaceSelection("<latex>" + cm.getSelection() + "</latex>");
                },
                "Ctrl-C": function(cm) {
                    cm.replaceSelection("<color id=\"1\">" + cm.getSelection() + "</color>");
                },
                "Ctrl-I": function(cm) {
                    cm.replaceSelection("<inflect case=\"3\">" + cm.getSelection() + "</inflect>");
                },
                "Ctrl-N": function(cm) {
                    cm.replaceSelection("<numebr>" + cm.getSelection() + "</number>");
                }
            }
        });
    });

    $('[data-definitions]').sortable({
        handle: '.handle',
        update: function(event, ui) {
            var id = 0;
            $('[data-definitions] .variable').each(function() {
                $(this).attr('data-var-id', id);
                $(this).find('input[name]').each(function() {
                    $(this).attr('name', ($(this).attr('name').replace(/vars\[\d+\]/, 'vars[' + id + ']')));
                });
                id++;
            });
        }
    });

	$form.find('[data-add-hint]').on('click', function() {
        var partial = $(this).parents('[data-partial]').data('partial');
		var id = $(this).parent().find('input').length;
		var $input = $('<input type="text" name="partials[' + partial + '][hints][' + id + '][hint]" class="form-control">');
		$input.on('change keyup', function() {
			highlight($(this));
		});

		var $hint = $('<div/>').addClass('hint');
		$hint.append($input);
		$(this).before($hint);
		return false;
	});

    var $container = $form.find('[data-definitions]');
    $form.find('[data-add-type]').on('click', function() {
        var type = $(this).data('add-type');
        var id = $container.find('[data-definition]').length;
        var $name = $('<input name="vars[' + id + '][name]" class="form-control">');
        var $input = $('<input name="vars[' + id + '][definition]" data-definition class="form-control">');
	    var $var = $('<div/>').addClass('variable');
	    $var.append($name).append($input);
        $container.append($var);

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
        $undoLink = $('<a href="#"></a>').text($link.data('label-undo'))
            .on('click', function() {
                $pointer.after($undo);
                $pointer.remove();
                $undoLink.remove();
            });

        $group.after($undoLink);
        $group.detach();
        $undo = $group;
    });
});
