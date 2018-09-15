#!/bin/sh

PROJECT_DIR="$( cd "$(dirname "$0")"; cd ..; cd .. ; pwd -P )"

PHP_CS_FIXER="$PROJECT_DIR/phpcsfix"


echo "┌─┐┬ ┬┌─┐┌─┐┌─┐┌─┐┬─┐ ┬"
echo "├─┘├─┤├─┘│  └─┐├┤ │┌┴┬┘"
echo "┴  ┴ ┴┴  └─┘└─┘└  ┴┴ └─"

git status --porcelain | grep -e '^[AM]\(.*\).php$' | cut -c 3- | while read line; do
        $PHP_CS_FIXER  "$line";
        git add "$line";
    done

echo "$PROJECT_DIR"
