> :white_check_mark: *Jeśli będziesz mieć problem z rozwiązaniem tego zadania, poproś o pomoc na odpowiednim kanale na Slacku, tj. `s5e07-php-composer-and-testing` (dotyczy [mentee](https://devmentor.pl/mentoring-javascript/)) lub na ogólnodostępnej i bezpłatnej [społeczności na Discordzie](https://devmentor.pl/discord). Pamiętaj, aby treść Twojego wpisu spełniała [odpowiednie kryteria](https://devmentor.pl/jak-prosic-o-pomoc/).*

&nbsp;

# `#05` PHP: Composer and Testing

Napisz testy zgodnie z duchem [TDD](https://www.youtube.com/watch?v=EZl0qo9J3VA) czyli najpierw tworzysz test (jest to pomysł na implementację), a potem dopiero piszesz rozwiazanie. Zadowalajace rozwiązanie możesz osiągnąć dopiero po kilku iteracjach [Red Green Refactor](https://www.youtube.com/watch?v=QPx64Ah0e-s).

Kodem, który będziesz testować może być klasa potrafiąca renderować odpowiednie formatowanie dla waluty tj. 
- gdzie ma się znależć znak waluty - przed czy po wartości,
- jak wygląda separator dziesiętny (kropka czy przecinek), 
- czy istnieje separator tysięczny

Nie korzystaj z gotowych rozwiązań tylko sam wszystko zaimplementuj od zera. 

> Podpowiedź: Każdy z punktów na liscie powyżej zaimplementuj jako osobą metodę - to ułatwi Ci testowanie rozwiązania. 

Przykładowanie działanie:

```
$cf = new CurrencyFormatter();
$str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => ',', 'thousands' => ' ']
); // => 2 410,12 PLN
```

&nbsp;
> :no_entry: *Jeśli nie posiadasz materiałów do tego zadania tj. **Wideo**, znajdziesz je na stronie [laracasts.com](https://laracasts.com/referral/bogolubow)*

> :arrow_left: [*poprzednie zadanie*](./../04) | ~~*następne zadanie*~~ :arrow_right:
