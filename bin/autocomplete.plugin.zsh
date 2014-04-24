#!/bin/zsh

_console_get_command_list () {
	php bin/console --no-ansi | sed "1,/Available commands/d" | awk '/^  [a-z]+/ { print $1 }'
}

_console () {
  if [ -f bin/console ]; then
    compadd `_console_get_command_list`
  fi
}

compdef _console bin/console
