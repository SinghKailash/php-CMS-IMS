
<?php
session_start();

if (!isset($_SESSION['user_name']))
{
	
	header("location: login.php");
}
	
else {
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" href="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min"></script>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:600">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style>

.content{
    margin-top: 40px;
}

h1{
    text-align: center;
    color: #81cbf0;
}

.table-hover > tbody > tr:hover > td,
.table-hover > tbody > tr:hover > th{
    background-color: #81cbf0;
    color: #ffffff;
}

th {
    text-align: center;
}

td {
    text-align: center;
}

.delete{
    color: red;
}

</style>
</head>

<body ng-app="Commande" ng-controller="commandeController">
 <div><?php include("includes/header.php")?></div> 

<h1>Order Form</h1>
    <div class="content">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Table No</th>
                        <th>Title</th>
                        <th>Price Per Unit</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>With Tax</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody><form action="order.php" method="post">
                    <tr ng-repeat="article in articles">
                        <th>
                            <input type="Serial No" ng-model="article.id" class="form-control bfh-number" placeholder="Id" min=0>
                        </th>
                        <td>
                            <input type="number" ng-model="article.reference" class="form-control bfh-number" placeholder="Reference" min=0>
                        </td>
                        <td>
                            <input type="text" ng-model="article.titre" class="form-control" placeholder="Title">
                        </td>
                        <td>
                            <input type="number" ng-model="article.prixUnitaire" class="form-control bfh-number">
                        </td>
                        <td>
                            <input type="number" ng-model="article.quantite" class="form-control bfh-number" min=0>	
                        </td>
                        <td>
                            <input type="number" ng-model="article.montantHT" class="form-control bfh-number" min=0>
                        </td>
                        <td>
                            <input type="number" ng-model="article.montantTTC" class="form-control bfh-number" min=0>
                        </td>
                        <td>
                            <a href ng:click="SupprimerArticle($index)"><i class="fa fa-times delete"></i></a>
                        </td>
                    </tr>
                    <tr class="success">
                        <th class="success">TOTAL</th>
                        <td class="success"></td>
                        <td class="success"></td>
                        <td class="success"></td>
                        <td class="success">{{ NombreArticle() }} item(s)</td>
                        <td class="success" ng-style="PrixTotalHT() >= 1000 && {'font-weight': 'bold'}">{{ PrixTotalHT() | number:2 }} Rs</td>
                        <td class="success" ng-style="PrixTotalHT() >= 1000 && {'font-weight': 'bold'}">{{ PrixTotalTTC() | number:2 }} Rs</td>
                        <td class="success"></td>
                    </tr>
                </form></tbody>
            </table>
            <a href ng:click="AjouterArticle()" class="btn btn-primary">Add an item <i class="fa fa-plus"></i></a>
        </div>
    </div>


<?php


include("includes/connection.php");
?>
 


</body>
<footer>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"> </script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.5/angular-sanitize.min.js"> </script> 
<script>
/**
 * Created by Sylvain MARTIN.
 */
angular.module('Commande', [])
    .controller('commandeController', ['$scope', function($scope) {

        $scope.articles = [
                { id: 1, reference: 123, titre: "Kingfisher Large", prixUnitaire: 666.63, quantite: 0, montantHT: 666.63, montantTTC: 799.95 },
                { id: 2, reference: 456, titre: "Blenders Pride Half", prixUnitaire: 324.96, quantite: 0, montantHT: 324.96, montantTTC: 389.95 },
                { id: 3, reference: 789, titre: "Old Monk Double Rum", prixUnitaire: 134.96, quantite: 0, montantHT: 134.96, montantTTC: 161.95 }
        ];



        $scope.PrixTotalTTC = function() {
            var resultTTC = 0;

            angular.forEach($scope.articles, function (article) {
                resultTTC += article.montantTTC * article.quantite;
            });
            return resultTTC;
        };

        $scope.PrixTotalHT = function() {
            var resultHT = 0;

            angular.forEach($scope.articles, function (article) {
                resultHT += article.montantHT * article.quantite;
            });
            return resultHT;
        };

        $scope.NombreArticle = function() {
            var resultArticle = 0;

            angular.forEach($scope.articles, function(article){
                resultArticle += article.quantite;
            });
            return resultArticle;
        };

        $scope.AjouterArticle = function() {
            $scope.articles.push({
                id: '',
                reference: '',
                titre: '',
                prixUnitaire: 0,
                quantite: 0,
                montantHT: 0,
                montantTTC: 0
            });
        };

        $scope.SupprimerArticle = function(index) {
            $scope.articles.splice(index, 1);
        };

    }]);
</script>
<div><?php include("includes/footer.php")?></div>
</footer>

</html>

<?php } ?>
