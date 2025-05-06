<?php

/**
 * Quotations controller class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * The array holding the quotations.
 */
define('QUOTATIONS', [
    ['Det finns ingen bättre utbildning än motgångar.',
    'Benjamin Disraeli'],
    ['Sjömannen ber inte om medvind, han lär sig segla.',
    'Gustaf Lindborg'],
    ['Att misslyckas är bara ett annat sätt att lära sig hur man gör något rätt.',
    'Marian Wright Edelman'],
    ['Du behöver inte bli någon du inte är för att bli bättre än du var.',
    'Sidney Poitier'],
    ['Det är klokare att gå sin egen väg än att gå vilse i andras fotspår.',
    'Okänd'],
    ['Gå vidare på din väg, då den endast existerar genom dina steg.',
    'Augustine of Hippo'],
    ['De minsta handlingarna är alltid bättre än de ädlaste avsikterna.',
    'Robin Sharma'],
    ['Ge inte upp all din glädje för en idé som du brukade ha om dig själv som inte är sann längre.',
    'Cheryl Strayed'],
    ['Följ det som fångar ditt hjärta, inte det som fångar dina ögon.',
    'Roy T. Bennett'],
    ['Du kan inte återvända och ändra början, men du kan börja där du är nu och ändra slutet.',
    'C.S Lewis'],
    ['Säg ”ja” till livet, och se hur livet plötsligt börjar arbeta för dig i stället för emot dig.',
    'Eckhart Tolle'],
    ['Ett negativt sinne kommer aldrig att ge dig ett positivt liv.',
    'Okänd'],
    ['Leta efter något positivt varje dag, även om du behöver leta lite extra mycket vissa dagar.',
    'Okänd'],
    ['Rikta alltid ditt ansikte mot solen och skuggorna kommer att falla bakom dig.',
    'Walt Whitman'],
    ['De med starkast hjärta är även de med flest ärr.',
    'Okänd'],
    ['Jag går långsamt, men jag går aldrig baklänges.',
    'Okänd'],
    ['Tro att du kan och du är halvvägs där.',
    'Theodore Roosevelt'],
    ['När du tvivlar på hur långt du kan gå, kom ihåg hur långt du har kommit.',
    'Okänd'],
    ['Det finns bara två sätt att leva sitt liv. Det ena är att leva som att mirakel inte existerar. Det andra är att leva som om allt är ett mirakel.',
    'Albert Einstein'],
    ['Kom ihåg: om någon säger att det är omöjligt så är det omöjligt för dem, inte för dig.',
    'Okänd'],
    ['Antigen så hittar jag en väg, eller så skapar jag en.',
    'Philip Sidney'],
    ['Gör ditt bästa. Ingen kan göra mer än så.',
    'John Wooden'],
    ['Vi glädjer oss över fjärilens skönhet, men erkänner sällan de förändringar den har genomgått för att uppnå den skönheten.',
    'Maya Angelou'],
    ['Ju mindre du försöker imponera, desto fridfullare kan du vara.',
    'Maxime Lagacé'],
    ['Ålder är inte en barriär. Det är en begränsning du sätter på ditt sinne.',
    'Jackie Joyner-Kersee'],
    ['Om du kan drömma det så kan du uppnå det.',
    'Zig Ziglar'],
    ['Du kan inte skydda dig själv från sorg utan att skydda dig själv från lycka.',
    'Jonathan Saffran Foer'],
    ['Den tid du tycker om att slösa bort är inte bortslösad tid.',
    'Marthe Troly-Curtin'],
    ['Mod kan inte se runt hörn, men går runt dem ändå.',
    'Mignon McLaughlin'],
    ['Jag har inte slutat vara rädd, men jag har slutat låta rädsla styra mig.',
    'Erica Jong'],
    ['Det vackra med rädsla är att när du springer emot den så springer den bort.',
    'Robin Sharma'],
    ['Det är bättre att korsa startlinjen och drabbas av konsekvenserna än att bara stirra på linjen resten av ditt liv.',
    'Paulo Coelho'],
    ['Begränsa inte dina utmaningar, utmana dina begränsningar.',
    'Okänd'],
    ['De små sakerna? De små stunderna? De är inte små.',
    'John Zabat-Zinn'],
    ['Tänk vad underbart det är att ingen behöver vänta en enda minut för att börja förändra världen.',
    'Anne Frank'],
    ['Förändring är svårast i början, rörigast i mitten och bäst i slutet.',
    'Robin Sharma'],
    ['Ingen ångrar att de har gjort sitt bästa.',
    'George Halas'],
    ['Du behöver inte vara perfekt för att vara fantastisk.',
    'Okänd'],
    ['Du är tillräcklig som du är. Du har inget att bevisa för någon.',
    'Maya Angelou'],
]);

/**
 * The QuotationsController class.
 */
class QuotationsController extends AbstractController
{
    /**
     * The API route.
     */
    #[Route("/api/quotation", name: "quotation")]
    public function quotation(): Response
    {
        $quote = array_rand(QUOTATIONS);
        $data = [
            'quotation' => QUOTATIONS[$quote][0],
            'author' => QUOTATIONS[$quote][1],
            'date' => date("Y-m-d"),
            'timestamp' => time()
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return $response;
    }
}
