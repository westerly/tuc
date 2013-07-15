<?php

//Permet l'affichage des message de confirmation ou d'erreur si il y'en a après d'une redirection vers cette vue
echo $this->Session->flash('ok');
echo $this->Session->flash('nok');


echo'<div class="add-partenaires form">';
echo $this->Form->create('Partenaire', array('type' => 'file'));
?>
<fieldset>
<table>
    <legend><h3>S'inscrire en tant que partenaire</h3></legend>
    <tr class="input text required">
        <td><label for="PartenairePartenaire">Nom <span style="color: red">*</span></label></td>
        <td><input name="data[Partenaire][partenaire]" maxlength="50" type="text" id="PartenairePartenaire" required="required"></td>
    </tr>
    <tr class="input text">
        <td><label for="PartenaireAdresseWeb">Site Web</label></td>
        <td><input name="data[Partenaire][adresseWeb]" maxlength="100" type="text" id="PartenaireAdresseWeb"></td>
    </tr>
    <tr class="input email">
        <td><label for="PartenaireEmail">Email <span style="color: red">*</span></label></td>
        <td><input name="data[Partenaire][email]" maxlength="100" type="email" id="PartenaireEmail"></td>
    </tr>
    <tr class="input text required">
        <td><label for="PartenaireAdresse">Adresse <span style="color: red">*</span></label></td>
        <td><input name="data[Partenaire][adresse]" maxlength="255" type="text" id="PartenaireAdresse" required="required"></td>
    </tr>
    <tr class="input number required">
        <td><label for="PartenaireCp">Code postal <span style="color: red">*</span></label></td>
        <td><input name="data[Partenaire][cp]" type="number" id="PartenaireCp" required="required"></td>
    </tr>
    <tr class="input select">
        <td><label for="PartenaireDepartementId">Département</label></td>
        <td><select name="data[Partenaire][departement_id]" id="PartenaireDepartementId">
            <option value="1">Ain</option>
            <option value="10">Aube</option>
            <option value="11">Aude</option>
            <option value="12">Aveyron</option>
            <option value="13">Bouches du rhône</option>
            <option value="14">Calvados</option>
            <option value="15">Cantal</option>
            <option value="16">Charente</option>
            <option value="17">Charente maritime</option>
            <option value="18">Cher</option>
            <option value="19">Corrèze</option>
            <option value="2">Aisne</option>
            <option value="21">Côte d'or</option>
            <option value="22">Côtes d'Armor</option>
            <option value="23">Creuse</option>
            <option value="24">Dordogne</option>
            <option value="25">Doubs</option>
            <option value="26">Drôme</option>
            <option value="27">Eure</option>
            <option value="28">Eure et Loir</option>
            <option value="29">Finistère</option>
            <option value="2a">Corse du Sud</option>
            <option value="2b">Haute Corse</option>
            <option value="3">Allier</option>
            <option value="30">Gard</option>
            <option value="31">Haute garonne</option>
            <option value="32">Gers</option>
            <option value="33">Gironde</option>
            <option value="34">Hérault</option>
            <option value="35">Ile et Vilaine</option>
            <option value="36">Indre</option>
            <option value="37">Indre et Loire</option>
            <option value="38">Isère</option>
            <option value="39">Jura</option>
            <option value="4">Alpes de haute provence</option>
            <option value="40">Landes</option>
            <option value="41">Loir et Cher</option>
            <option value="42">Loire</option>
            <option value="43">Haute loire</option>
            <option value="44">Loire Atlantique</option>
            <option value="45">Loiret</option>
            <option value="46">Lot</option>
            <option value="47">Lot et Garonne</option>
            <option value="48">Lozère</option>
            <option value="49">Maine et Loire</option>
            <option value="5">Hautes alpes</option>
            <option value="50">Manche</option>
            <option value="51">Marne</option>
            <option value="52">Haute Marne</option>
            <option value="53">Mayenne</option>
            <option value="54">Meurthe et Moselle</option>
            <option value="55">Meuse</option>
            <option value="56">Morbihan</option>
            <option value="57">Moselle</option>
            <option value="58">Nièvre</option>
            <option value="59">Nord</option>
            <option value="6">Alpes maritimes</option>
            <option value="60">Oise</option>
            <option value="61">Orne</option>
            <option value="62">Pas de Calais</option>
            <option value="63">Puy de Dôme</option>
            <option value="64">Pyrénées Atlantiques</option>
            <option value="65">Hautes Pyrénées</option>
            <option value="66">Pyrénées Orientales</option>
            <option value="67">Bas Rhin</option>
            <option value="68">Haut Rhin</option>
            <option value="69">Rhône</option>
            <option value="7">Ardèche</option>
            <option value="70">Haute Saône</option>
            <option value="71">Saône et Loire</option>
            <option value="72">Sarthe</option>
            <option value="73">Savoie</option>
            <option value="74">Haute Savoie</option>
            <option value="75">Paris</option>
            <option value="76">Seine Maritime</option>
            <option value="77">Seine et Marne</option>
            <option value="78">Yvelines</option>
            <option value="79">Deux Sèvres</option>
            <option value="8">Ardennes</option>
            <option value="80">Somme</option>
            <option value="81">Tarn</option>
            <option value="82">Tarn et Garonne</option>
            <option value="83">Var</option>
            <option value="84">Vaucluse</option>
            <option value="85">Vendée</option>
            <option value="86">Vienne</option>
            <option value="87">Haute Vienne</option>
            <option value="88">Vosge</option>
            <option value="89">Yonne</option>
            <option value="9">Ariège</option>
            <option value="90">Territoire de Belfort</option>
            <option value="91">Essonne</option>
            <option value="92">Haut de seine</option>
            <option value="93">Seine Saint Denis</option>
            <option value="94">Val de Marne</option>
            <option value="95">Val d'Oise</option>
        </select></td>
    </tr>
    <tr class="input text required">
        <td><label for="PartenaireVille">Ville <span style="color: red">*</span></label></td>
        <td><input name="data[Partenaire][ville]" maxlength="100" type="text" id="PartenaireVille" required="required"></td>
    </tr>
    <tr class="input textarea required">
        <td><label for="PartenaireDescription">Description <span style="color: red">*</span></label></td>
        <td><textarea name="data[Partenaire][description]" cols="30" rows="6" id="PartenaireDescription" required="required"></textarea></td>
    </tr>
    <tr class="input file">
        <td><label for="PartenaireNewFichierLogo">Logo <span style="color: red">*</span></label></td>
        <td><input type="file" name="data[Partenaire][new_fichierLogo]" id="PartenaireNewFichierLogo"></td>
    </tr>
</table>
</fieldset>


<?php
echo $this->Form->end(__('Envoyer'));

echo '</div>';

?>
