# FirstModule

## Opis
FirstModule to moduł dla PrestaShop 1.7, który umożliwia wyświetlanie spersonalizowanego bloku HTML na głównej stronie sklepu. Moduł oferuje łatwą w obsłudze konfigurację poprzez panel administracyjny, pozwalając na edycję treści bloku za pomocą wbudowanego edytora WYSIWYG.

## Funkcjonalności
- Wyświetlanie bloku HTML na głównej stronie
- Konfiguracja treści bloku przez panel administracyjny z użyciem edytora WYSIWYG
- Możliwość dodawania stylów CSS do własnych treści

## Wymagania
- PrestaShop 1.7.x
- PHP 7.1 lub nowszy

## Instalacja
1. Pobierz archiwum modułu.
2. Zaloguj się do panelu administracyjnego sklepu.
3. Przejdź do sekcji "Moduły" > "Moduły i usługi" > "Dodaj nowy moduł".
4. Wybierz pobrane archiwum z modułem i kliknij "Prześlij moduł".
5. Po zainstalowaniu modułu znajdź go na liście i kliknij "Konfiguruj", aby dostosować ustawienia.
6. Aby zarejestrować hook odpowiedzialny za ładowanie plików CSS, przejdź do sekcji "Wygląd" > "Pozycje".
7. Kliknij przycisk "Przemieszczanie modułu", a następnie wyszukaj nazwę Twojego modułu.
8. Znajdź `displayHeader` na liście dostępnych hooków, wybierz go i zapisz na dole strony zmianę.
9. Zapisz zmiany, aby upewnić się, że konfiguracja zostanie zastosowana.

## Konfiguracja
Po zainstalowaniu modułu możesz skonfigurować wyświetlaną treść za pomocą panelu konfiguracyjnego modułu. Umożliwia on edycję treści HTML, która będzie wyświetlana na głównej stronie sklepu.

## Dodatkowa konfiguracja

### Wyłączenie HTMLPurifier

Dla poprawnego działania edytora WYSIWYG oraz prawidłowego wyświetlania treści HTML dodanych przez ten edytor, może być konieczne wyłączenie opcji HTMLPurifier w PrestaShop.

Aby wyłączyć HTMLPurifier:

1. Zaloguj się do panelu administracyjnego PrestaShop.
2. Przejdź do sekcji **Ustawienia** > **Ogólne**.
3. Znajdź opcję **Użyj biblioteki HTMLPurifie** i wyłącz ją.
4. Zapisz zmiany.

Pamiętaj, że wyłączenie HTMLPurifier może wpłynąć na ogólne bezpieczeństwo Twojej strony, umożliwiając wprowadzanie dowolnego kodu HTML.

## Personalizacja
Aby dostosować wygląd treści, możesz dodać własne style CSS. Moduł zawiera plik `firstmodule.css`, który można edytować według własnych potrzeb.

---

Autor: Krzysztof Juszczak
Wersja: 1.0.0