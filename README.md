
## Použité technologie

- PHP
- HTML + CSS (vložené ve `<style>`
- Session pro přihlášení
- Textový soubor `posts.txt`

## Funkce

- Přihlášení pomocí přezdívky (uloženo v session)
- Přesměrování nepřihlášených uživatelů
- Formulář pro přidání příspěvku
- Zobrazení všech příspěvků s autorem, časem a obsahem
- Odhlášení (zrušení session)
- Zabezpečení výstupu pomocí `htmlspecialchars`
- Nahrazení nových řádků značkou `|n|` a zpětná konverze na `<br>`

## Poznámky

- Příspěvky se ukládají do `posts.txt`
