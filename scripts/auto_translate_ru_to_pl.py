#!/usr/bin/env python3
import os
import re
import subprocess
from pathlib import Path

pattern = re.compile(r'[А-Яа-яЁё][А-Яа-яЁё\- ]*[А-Яа-яЁё]')


def translate(text: str) -> str:
    """Translate Russian text to Polish using translate-shell."""
    try:
        result = subprocess.run(
            ['trans', '-b', 'ru:pl', text],
            capture_output=True, check=True, text=True
        )
        return result.stdout.strip()
    except Exception:
        return text


def process_file(path: Path) -> None:
    data = path.read_text()

    def repl(match: re.Match) -> str:
        rus = match.group(0)
        return translate(rus)

    translated = pattern.sub(repl, data)
    path.write_text(translated)


def main() -> None:
    roots = ['resources/views', 'resources/views_old']
    for root in roots:
        for p in Path(root).rglob('*.blade.php'):
            process_file(p)


if __name__ == '__main__':
    main()
