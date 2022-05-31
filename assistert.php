<?php
   session_start();

   include("connection.php");
   include("functions.php");

   $user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Hovedside</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="utf-8">
   <link rel="stylesheet" href="stylesheet.css">
   <link rel="stylesheet" href="assets/styles/cm-chessboard.css"/>
   <link rel="stylesheet" href="examples/styles/examples.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
</head>

<body>

<header>
  <nav class="navigasjon">
    <img class="logo" src="./assets/images/dronning.png" alt="logo">
    <h1>Assistert Sjakk</h1>
    <a href=""></a>
    <a href="index.php">Manuell</a>
    <a href="logout.php">Logg ut</a>
    <div class="dropdown">
      <button class="dropbtn">Språk</button>
      <div class="dropdown-content">
        <a href="assistert.php">Norsk</a>
        <a href="assistertEngelsk.php">Engelsk</a>
        <a href="#">TBA</a>
      </div>
    </div>
  </nav>
  <button onclick="myFunction()"><h2>Vis/Skjul Regler</h2></button>
</header>

<div class= "hovedinnhold">

//Sjakkbrettet lastes inn. Denne varianten har regeldefinerte bevegelser og "kunstig intelligens".
//Copyright (c) 2017 Stefan Haack <shaack@gmail.com> (http://shaack.com)(https://github.com/shaack/cm-chessboard)
  <div class="spillcontainer">
<div class="board" id="board"></div>
<script type="module">
    import {INPUT_EVENT_TYPE, COLOR, Chessboard, MARKER_TYPE} from "./src/cm-chessboard/Chessboard.js"

const chess = new Chess()

function inputHandler(event) {
    console.log("event", event)
    event.chessboard.removeMarkers(undefined, MARKER_TYPE.dot)
    event.chessboard.removeMarkers(undefined, MARKER_TYPE.square)
    if (event.type === INPUT_EVENT_TYPE.moveStart) {
        const moves = chess.moves({square: event.square, verbose: true});
        event.chessboard.addMarker(event.square, MARKER_TYPE.square)
        for (const move of moves) {
            event.chessboard.addMarker(move.to, MARKER_TYPE.dot)
        }
        return moves.length > 0
    } else if (event.type === INPUT_EVENT_TYPE.moveDone) {
        const move = {from: event.squareFrom, to: event.squareTo}
        const result = chess.move(move)
        if (result) {
            event.chessboard.removeMarkers(undefined, MARKER_TYPE.square)
            event.chessboard.disableMoveInput()
            event.chessboard.setPosition(chess.fen())
            const possibleMoves = chess.moves({verbose: true})
            if (possibleMoves.length > 0) {
                const randomIndex = Math.floor(Math.random() * possibleMoves.length)
                const randomMove = possibleMoves[randomIndex]
                setTimeout(() => { // smoother with 500ms delay
                    chess.move({from: randomMove.from, to: randomMove.to})
                    event.chessboard.enableMoveInput(inputHandler, COLOR.white)
                    event.chessboard.setPosition(chess.fen())
                }, 500)
            }
        } else {
            console.warn("invalid move", move)
        }
        return result
    }
}

const board = new Chessboard(document.getElementById("board"), {
    position: chess.fen(),
    sprite: {url: "./assets/images/chessboard-sprite-staunty.svg"},
    style: {moveFromMarker: undefined, moveToMarker: undefined}, // disable standard markers
    orientation: COLOR.white
})
board.enableMoveInput(inputHandler, COLOR.white)
 </script>
 
 <script>
 function myFunction() {
  var x = document.getElementById("hoyre");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
  </div>
<div id="hoyre">
    <article>Sjakk regler 

<h1>Hei, <?php echo $user_data['Bruker_navn']; ?>, dette er spillets gang:</h1> 

  <p>Den som spiller med de hvite brikkene som benevnes «hvit», mens spilleren som spiller med de svarte brikkene som benevnes «svart» eller «sort». Det er alltid «hvit» som starter spillet, og man flytter alltid bare ett trekk om gangen før det blir motstanders tur.</p>  

<p>I offisielle turneringer er det som regel forhåndsbestemt hvem som starter med hvilken farge, enten ved at hele turneringen er satt opp på forhånd eller etter et gitt system som skal inndele motstanderne etter poengfangst og farge i tidligere runder.</p>  

Brikkenes bevegelse: 
<div></div>

<p>Kongen:  

Kongen kan flyttes ett, og bare ett felt av gangen - enten horisontalt, vertikalt eller diagonalt. Unntaket er ved rokade, da kongen alltid flyttes to felter mot det tårnet den rokerer med.</p>

<p><img src="./assets/images/konge.png"></p>

<p>Tårnet:  

Tårnet kan flytte til alle ledige felter i horisontal og vertikal retning.</p>

<p><img src="./assets/images/tarn.png"></p>

<p>Løperen:  

Løperne kan flytte til alle ledige felter i diagonal retning. </p>

<p><img src="./assets/images/loper.png"></p>

<p>Dronningen:  

Dronningen kan flytte til alle ledige felter i alle retninger, horisontalt, vertkalt og diagonalt.</p>

<p><img src="./assets/images/dronning.png"></p>

<p>Springeren:  

Springeren flyttes alltid ett felt horisontalt eller vertikalt og ett felt diagonalt. Springeren skifter alltid farge på feltet den står på når den flyttes.  </p>

<p><img src="./assets/images/hest.png"></p>

<p>Bonden:  

Den hvite bonden kan flyttes til de feltene som er merket med X. Bonden på c6 kan i tillegg slå et av tårnene. 
<div></div>
Forvandling: En bonde som kommer helt over brettet til 8. raden (1. rad for motstanderen) skal forvandles til en offiser som spilleren selv velger. Hvilken brikke som velges er ikke avhengig av hvilke andre offiserer som er på brettet, dvs. at en kan velge dronning (det vanligste), selv om en har dronningen på brettet fra før.  </p>

<p><img src="./assets/images/bonde.png"></p>

<p>Rokade:  

Rokade er et spesialtrekk der både kongen og et tårn flyttes. For å kunne gjennomføre en rokade må verken kongen eller tårnet ha flyttet tidligere i partiet, og alle feltene mellom de to brikkene må være ledige. Ved rokade flyttes kongen to skritt mot tårnet, deretter flyttes tårnet over kongen, til feltet ved siden av den. 
<p></p>

Ved «kort rokade» rokerer kongen med tårnet i h-linjen. For hvit flyttes kongen fra e1 til g1, mens tårnet flyttes fra h1 til f1. For svart flyttes kongen fra e8 til g8, mens tårnet flyttes fra h8 til f8. Ved «lang rokade» rokerer kongen med tårnet i a-linjen. For hvit flyttes kongen fra e1 til c1, mens tårnet flyttes fra a1 til d1. For svart flyttes kongen fra e8 til c8, mens tårnet flyttes fra a8 til d8. </p>

<p>Rokade er ikke tillatt dersom:</p>
<ul>
<li>Kongen eller tårnet man vil rokere med har flyttet tidligere i partiet.</li>

<li>Kongen står i sjakk (dvs. er angrepet av motstanderen).</li>

<li>Feltet kongen skal passere over er angrepet av motstanderen.</li> 

<li>Feltet kongen flytter til er angrepet av motstanderen.</li> 
</ul>

<p>Sjakk og sjakk matt:</p>

<p>En spiller sies å stå i sjakk om ens konge er angrepet av enhver av motstanderens brikker (unntatt kongen). Siden det ikke er lov å stå i eller flytte inn i sjakk kan dette unngås med:</p>

<p>Gå ut av sjakken, gå til et felt som ikke er angrepet av noen av motstanderens brikker, 

Sette en brikke mellom kongen og den angrepne brikken, 

Slå ut den brikken som angriper kongen.</p>

<p>En spiller sies å stå i sjakk matt om ens konge er angrepet av enhver av motstanderens brikker (unntatt kongen), uten at ens konge kan gå ut av sjakken eller en kan sette en brikke mellom eller en kan slå ut den angripende brikken. Den som står i sjakk matt, har tapt spillet og partiet er over.</p>


<p><h1>Åpningstrekk</h1></p>

<p>
<ul>
<p><li>Italiensk åpning: Italiensk åpning begynner med 1.e4->e5 2.Hf3->Hc6 3.Lc4. Poenget er å få kontroll over sentrum raskt med bonden og hesten din og så plassere løperen på det farligste feltet. Du forbereder også til å få kongen i sikkerhet med rokade.</li></p>  

<p><li>Siciliansk forsvar: Italiensk åpning begynner med 1.e4->e5 2.Hf3->Hc6 3.Lc4. Poenget er å få kontroll over sentrum raskt med bonden og hesten din og så plassere løperen på det farligste feltet. Du forbereder også til å få kongen i sikkerhet med rokade.</li></p>  

<p><li>Fransk forsvar: Det franske forsvaret er en av de første strategiske åpningene som hver sjakkspiller bør lære. Etter e5 (nå eller etterpå), vil begge sider ha bondekjeder. En risiko med fransk forsvar er at c8-løperen kan være veldig vanskelig å utvikle.</li></p> 

<p><li>Ruy-Lopez: Spansk åpning er en av de eldste og mest klassiske åpningene. Den ble oppkalt etter en spansk biskop som skrev en av de første bøkene om sjakk. Ruy Lopez angriper hesten som forsvarer e5-bonden. Hvit håper på å bruke dette angrepet til å legge mer press på svart i sentrum.</li></p>  

<p><li>Slavisk forsvar: Slavisk forsvar er en veldig solid åpning som gir trygt forsvar av d5-bonden. Alle de svarte brikkene kan utvikles til naturlige felter, men svart vil vanligvis ha litt mindre plass.</li></p>
</ul>
</p>  

 </article>

</div>
</div>

<footer>

    <div class= "footertext">
        <p>HTML og tilhørende CSS/javascript laget av Gruppe20:</p>

        <p> Tedros Robel, Filip Johansen, Sonny Uldal Teigen, Nicholas Gundersen Sæthre </p>

        <p>Sjakk API og tilhørende CSS/javascript:</p>

<p>Copyright (c) 2017 Stefan Haack <shaack@gmail.com> (http://shaack.com)(https://github.com/shaack/cm-chessboard)</p>

    </div>
</footer>
</body>
</html>