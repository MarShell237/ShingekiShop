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
            border: 1px solid #ddd;
        }
        
        tbody td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        
        tfoot tr {
            /* background-color: #f2f2f2; */
            font-weight: bold;
            text-align: right;
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body style="background-color:#1F1F1F; color:white">

<h1 style="font-family:sans-serif;font-size:40px;text-decoration:underline">Facture d'achat</h1>
   <div class="div1">
    <span style="margin-bottom:40px">
      <u><h2 style="font-family:sans-serif;font-size:30px;text-decoration:underline">Coordonner de l'entreprise</h2></u>
        <p style="font-family:sans-serif;font-size:20px;"><span style="text-decoration:underline">Nom de l'entreprise:</span> Shingekishop</p>
        <p style="font-family:sans-serif;font-size:20px;"><span style="text-decoration:underline">Ville:</span> Dschang,Cameroun</p>
        <p style="font-family:sans-serif;font-size:20px;"><span style="text-decoration:underline">Adresse email:</span> Shingekishop@gmail.com</p>
        <p style="font-family:sans-serif;font-size:20px;"><span style="text-decoration:underline;margin-bottom:40px">Tel:</span>+237 651876033</p>
        </span>
    </span>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($paniers as $panier )
            
           
            <tr>
                <td>{{$panier->name_product}}</td>
                <td>1</td>
                <td>{{$panier->prix}}</td>
                <td>{{$panier->prix}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
           
            <tr>
                <td colspan="3">Quantite total:</td>
                <td style="color: rgb(255, 244, 184)">{{$quantiter}}</td>
            </tr>
            <tr>
                <td colspan="3">Total:</td>
                <td style="color: gold;font-size:25px">{{$prix}} fcfa</td>
            </tr>
            <tr>
    <td colspan="5" style="padding: 10px">
        <h2 style="margin-right: 20px">Moyen de paiement</h2>
        <form action="{{route('buy')}}" method="POST">
        @csrf
        @method('PUT')
            <select name="moyen_paiement" style="width:190px; padding:10px;border-radius:10px;font-size:20px;background-color:#1F1F1F;color:white">
                <option value="om">orange money</option>
                <option value="momo">mobile money</option>
            </select>

            <button type="submit" style="background-color:#32A2E1;padding:10px;font-size:20px;color:white;border-width:0;border-radius:10px;margin:0 20px">Valider</button>
        </form>
    </td>
</tr>

        </tfoot>

    </table>

</body>
</html