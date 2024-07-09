<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture d'achat</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

       p{
        margin: 4px;
        font-weight: bolder;
       } 
       h1{
        display: flex;
        justify-content: center;
        align-items: center;
       }
        thead th {
            /* background-color: #f2f2f2; */
            padding: 10px;
            text-align: left;
            border: 1px outset #ddd;
        }
        
        tbody td ,tbody th{
            padding: 8px;
            text-align: left;
            border: 1px outset #ddd;
        }
        
        tfoot tr {
            /* background-color: #f2f2f2; */
            font-weight: bold;
            text-align: right;
            padding: 10px;
            border: 1px solid #ddd;
        }

        button{
          border: 1px outset black !important;
          cursor: pointer;
        }

        button:active{
          border: 1px solid black !important;
        }
    </style>
</head>

<body style="background-color:#1F1F1F; color:white">

<h1 style="font-family:sans-serif;font-size:40px;text-decoration:underline">Facture d'achat</h1>
   <div class="div1">
    <span style="margin-bottom:40px">
      <u><h2 style="font-family:sans-serif;font-size:30px;text-decoration:underline">Coordonnee de l'entreprise</h2></u>
        <p style="font-family:sans-serif;font-size:20px;"><span style="text-decoration:underline">Nom de l'entreprise:</span> Shingeki Shop</p>
        <p style="font-family:sans-serif;font-size:20px;"><span style="text-decoration:underline">Ville:</span> Dschang,Cameroun</p>
        <p style="font-family:sans-serif;font-size:20px;"><span style="text-decoration:underline">Adresse email:</span> Shingekishop@gmail.com</p>
        <p style="font-family:sans-serif;font-size:20px;"><span style="text-decoration:underline;margin-bottom:40px">Tel:</span>+237 651876033</p>
        </span>
    </span>

    <table>
        <thead>
        </thead>
        <tbody>
          @foreach ($villes as $ville)

            @php
              $isNotDisplay = true;
            @endphp
            @foreach ($factures as $facture)
              @if ($facture->panier->ville_id == $ville->id && $isNotDisplay)
                @php
                  $isNotDisplay = false;
                @endphp
                <tr>
                  <th style="display:block;text-align: center;font-size:40px;margin-top:40px"><span style="font-size:20px;">Destination:</span> {{ $ville->name }}</th>
                </tr>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
              @endif
            @endforeach

            @foreach ($factures as $facture )
                @if ($facture->panier->ville_id == $ville->id)
                  <tr>
                    <td>{{ $facture->panier->product->name }}</td>
                    <td>{{ $facture->panier->quantite }}</td>
                    <td>{{ $facture->panier->product->getPrice() }} fcfa</td>
                    <td>{{ number_format($facture->panier->product->price * $facture->panier->quantite,0,' ',' ') }} fcfa</td>
                  </tr>
                @endif
            @endforeach

            @php
              $isNotDisplay = true;
              @endphp
            @foreach ($factures as $facture)
              @if ($facture->panier->ville_id == $ville->id && $isNotDisplay)
                @php
                  $isNotDisplay = false;
                  $quantiteDes = 0;
                  $prixDes = 0;
                  foreach ($factures as $key => $facture) {
                    if ($facture->panier->ville_id == $ville->id) {
                      $quantiteDes += $facture->panier->quantite;
                      $prixDes += $facture->panier->product->price * $facture->panier->quantite;
                    }
                  }
                @endphp
                <tr style="border: 1px outset #ddd">
                  <td colspan="3"  style="text-align: right;border-width:0">Quantite total en destination de {{ $ville->name }}:</td>
                  <td style="color: rgb(255, 244, 184);font-size:20px;text-align: right;border-width:0">{{$quantiteDes}} produits</td>
                </tr>
                <tr style="border: 1px outset #ddd">
                  <td colspan="3" style="text-align: right;border-width:0">Prix Total en destination de {{ $ville->name }}:</td>
                  <td style="color: gold;font-size:30px;text-align: right;border-width:0">{{number_format($prixDes,0,' ',' ')}} fcfa</td>
                </tr>
              @endif
            @endforeach
          @endforeach
        </tbody>
            <tr>
              <div></div>
                <td colspan="3" style="padding:30px;font-size:40px">Quantite total</td>
                <td style="color: rgb(255, 244, 184);font-size:30px;padding:30px;text-align:right;font-weight:bold">
                  {{$quantiteTotal}} produits
                </td>
              </tr>
              <tr>
                <td colspan="3" style="padding:30px;font-size:40px">Prix Total:</td>
                <td style="padding:0;color: gold;font-size:60px;text-align:right;font-weight:bold">{{number_format($prixTotal,0,' ','.')}} fcfa</td>
              </tr>
              <tr>
    <td colspan="5" style="padding: 10px;text-align:right;">
        <h2 style="margin-right: 20px">Moyen de paiement</h2>
        <form action="{{route('facture.sorry')}}" method="GET">
            @csrf
            <select name="moyen_paiement" style="width:190px; padding:10px;border-radius:10px;font-size:20px;background-color:#1F1F1F;color:white">
                <option value="om">orange money</option>
                <option value="momo">mobile money</option>
            </select>

            <button type="submit" style="background-color:#32A2E1;padding:10px;font-size:20px;color:white;border-width:0;border-radius:10px;margin:0 20px;width:200px">
              Valider
            </button>
        </form>
    </td>
</tr>

        </tfoot>

    </table>

</body>
</html