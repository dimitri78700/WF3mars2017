    <form method="post" enctype="multipart/form-data" action=""> <!-- "multipart/form-data" perùet d'uploader un fichier et de générer une superglobale $_FILES -->

                <input type="hidden" id="id_salle" name="id_salle"> <!-- champ caché qui récetionne l'id_produit nécessaire lors de la modification d'un produit existant -->
                
                <label for="titre">Titre</label><br>
                <textarea id="titre" name="titre"></textarea><br><br>

                <label for="adresse">adresse</label><br>
                <textarea id="adresse" name="adresse"></textarea><br><br>

                <label for="code_postal">code postal</label><br>
                <input type="text" id="code_postal" name="code_postal"><br><br>


                <label>pays</label><br>
                <select name="pays">
                    <option value="france">France</option>
                </select><br><br>

                <label>ville</label><br>
                <select name="ville">
                    <option value="paris">Paris</option>
                    <option value="lyon" >Lyon</option>
                    <option value="marseille">Marseille</option>
                </select><br><br>

                   <label>Catégorie</label><br>
                <select name="Catégorie">
                    <option value="reunion">Reunion</option>
                    <option value="bureau">Bureau</option>
                    <option value="formation">Formation</option>
                </select><br><br>

                <label for="description">Description</label><br>
                <textarea id="description" name="description"></textarea><br><br>


                   <label>Capacité</label><br>
                <select name="capacite">
                    <option value="1">1</option>
                    <option value="2" >2</option>
                    <option value="3">3</option>
                </select><br><br>

                <label for="photo">Photo</label><br><br>
                <input type="file" id="photo" name="photo" ><br><br>
                <!--Coupler avec l'attribut enctype ="multipart/form-data" de la balise form, le type 'file' perment d'uploder un fichier ici une photo-->

                <input type="submit" value="enregistrer" class="btn"><br><br>

        </form>