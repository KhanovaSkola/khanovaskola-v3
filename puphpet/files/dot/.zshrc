ZSH=$HOME/.oh-my-zsh

export UPDATE_ZSH_DAYS=6
ZSH_THEME="robbyrussell"
DISABLE_AUTO_TITLE="true"

LESSCHARSET=UTF-8

cd /var/www/khanovaskola.cz

plugins=(composer compleat gitfast git-extras osx urltools web-search zmv)

source $ZSH/oh-my-zsh.sh

# Set word movement for OS X
bindkey -e
bindkey '^[[1;9C' forward-word
bindkey '^[[1;9D' backward-word

alias zshconfig="nano ~/.zshrc"
alias reload="source ~/.zshrc"

alias gs="git status"
alias gad="git add"
alias gl="git lg | HEAD -n 10"
alias gc="git commit -m"
alias gca="git commit -am"
alias gp="git push"
alias gd="LESSCHARSET=UTF-8 git diff --color-words"

# http://stackoverflow.com/a/14127035/326257
alias root='cd "$(git rev-parse --show-toplevel)"'

alias composer="rlwrap composer"

export PATH=/usr/local/bin:/usr/local/php5/bin:$PATH:/usr/bin:/bin:/usr/sbin:/sbin:/usr/texbin:/usr/local/sbin:/usr/bin/gem

precmd() {
	echo -ne "\e]1;Kš `basename $PWD`\a"
}
