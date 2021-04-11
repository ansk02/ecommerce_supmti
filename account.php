<?php 

require_once 'function.php';

logged_only();
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

             <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header class="header">
            <a href="#" class="logo">Ecommerce</a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
            <ul class="menu">
            <?php  if(isset($_SESSION['auth'])): ?>
                <li><a href="logout.php">Deconnecter</a></li>
            <?php endif; ?>
            </ul>
        </header>


    <div class="container" style="margin-top: 70px;">

        <div class="row">

            <div class="my-header">

                <div class="title">
                    <h1><span id="mon-titre">Liste des produits</span><a href="ajout_produit.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus">Ajouter</span></a></h1>
                </div>
                
            </div>

            <table class="table">

            	<thead class="table-success table-striped table-hover">

            		<tr>
            			<th>Produits</th>
            			<th>Désignation</th>
            			<th>Catégorie</th>
            			<th>Prix</th>
            			<th>Actions</th>
            		</tr>
            		
            	</thead>

            	<!-- CORPS DU TABLEAU -->
            	<tbody>
            		
            		<tr>
            			<td>Samsung Galaxy S9</td>
            			<td>Téléphone</td>
            			<td>Appareil electronique</td>
            			<td>250.00 <sup>€</sup></td>
            		</tr>

            	</tbody>
 				
			</table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<?php  require_once 'footer.php'; ?>





