<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Attestation de fin de stage</title>
    <style>
        /* Styles pour l'attestation */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .attestation {
            text-align: center;
            padding: 20px;
            border: 1px solid #000;
            max-width: 600px;
        }

        .logo {
            margin-bottom: 20px;
            max-width: 160px; /* Ajustez la taille du logo selon vos besoins */
            height: auto; /* Permet de conserver les proportions d'origine */
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            margin-top: -2%;
        }

        .title {
            font-weight: bold;
        }

        .signature {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="attestation">
            <img class="logo" src="imageats/1.png" alt="Logo DXC Technologie">
            <h1> <strong>Attestation de fin de stage</strong> </h1>
            
            <p style="text-align: justify;">
                Je soussigné(e), représentant(e) de la société <span style="font-weight: bold;">DXC Technologie</span>, certifie par la présente que <span style="font-weight: bold;">{{ $stagiaire->name }} </span>, spécialité en <span style="font-weight: bold;">{{ $stagiaire->specialite }} </span>, a effectué un stage au sein de notre entreprise du <span style="font-weight: bold;">{{ $stagiaire->datedebut }} </span> au <span style="font-weight: bold;"> {{ $stagiaire->datefin }} </span>.
            </p>
            
            <p>Cette attestation confirme que le stagiaire a effectué son stage au sein de notre entreprise dans le cadre de sa formation. Pendant toute la durée de son stage, il a fait preuve d'un grand professionnalisme, d'une bonne adaptabilité et d'une réelle volonté d'apprendre. Ses compétences dans le domaine de <span style="font-weight: bold;">{{ $stagiaire->specialite }} </span> ont été mises en valeur et appréciées par l'équipe.</p>
            
            <p>Nous tenons à exprimer notre satisfaction quant à sa contribution et à la qualité de son travail tout au long de son stage. Son implication, sa rigueur et son esprit d'équipe ont été des atouts indéniables.</p>
            
            <p>Nous lui souhaitons une excellente continuation dans sa carrière professionnelle et restons à sa disposition pour tout renseignement complémentaire.</p>
            
            <br> 
            
            <div class="signature">
                <p>Fait à Rabat, le {{ $stagiaire->datefin }}  </p>
                <p><span class="title">signature</span></p>
                <p><span ></span></p>
            </div>
        </div>
    </div>
</body>
</html>
