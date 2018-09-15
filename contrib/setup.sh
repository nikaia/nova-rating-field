#!/bin/bash

GIT_DIR="$( cd "$(dirname "$0")"; cd .. ; pwd -P )"
GIT_HOOKS_DIR="$( cd "$GIT_DIR"; cd .git/hooks ; pwd -P )"


echo "╔═╗╔═╗╔╗╔╔╦╗╦═╗╦╔╗   ╔═╗╔═╗╔╦╗╦ ╦╔═╗"
echo "║  ║ ║║║║ ║ ╠╦╝║╠╩╗  ╚═╗║╣  ║ ║ ║╠═╝"
echo "╚═╝╚═╝╝╚╝ ╩ ╩╚═╩╚═╝  ╚═╝╚═╝ ╩ ╚═╝╩"
echo " "

# Make phpcsfix script executable
chmod +x "$GIT_DIR"/phpcsfix
echo "  - Make phpcsfix executable. [$GIT_DIR/phpcsfix]"

# Pre Commit
cp "$GIT_DIR/contrib/pre-commit.sh" "$GIT_HOOKS_DIR/pre-commit"
chmod +x "$GIT_HOOKS_DIR"/pre-commit
echo "  - Copied pre-commit hook. [$GIT_HOOKS_DIR/pre-commit]"
echo "  -> Done."

