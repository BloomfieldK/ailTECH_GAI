<div id="menu">
      <h2> Menu </h2>    
    <h4> Tri </h4>
    <ul>
      <li> <a href=./controller.php?cas=idDemande target=controller> ↓  Id </a> </li>
      <li> <a href=./controller.php?cas=budget target=controller> ↓ Budget</a></li>
      <li> <a href=./controller.php?cas=personne target=controller>  ↓ Personne </a></li>
      <li> <a href=./controller.php?cas=genre target=controller>  ↓ Genre </a></li>
      <li> <a href=./controller.php?cas=ville target=controller> ↓ Ville </a></li>
      <li> <a href=./controller.php?cas=superficie target=controller> ↓ Superficie</a></li>
    </ul>
    <hr>
    <h4> Filtrer </h4>
    <ul>
      <li> <a href=./controller.php?cas=budmoy target=controller>Budget moyen </a></li>
      <li> <a href=./controller.php?cas=mini target=controller> Budget mini</a></li>
      <li> <a href=./controller.php?cas=maxi target=controller> Budget maxi </a></li>
      <li> <a href=./controller.php?cas=budsupmoy target=controller> Budget > Moyenne </a></li>
      <li> <a href=./controller.php?cas=nbbiens target=controller> Nombre de biens </a></li>
    </ul>
    <hr>
    <h4>Recherche par Critères</h4>
    <div id="formulaire">
            <table>
                  <tr>
                        <th>
                        <form name=form1 action=./controller.php method=post target=controller> Demande pour la ville de
                              <input type=text name=ville id=ville size=20>
                              <input type=hidden name=cas value=villePrecise>
                              <input type=button name=bouton value=Ville onclick=javascript:controle(form1,ville,ville);>
                        </form>
                        </th>
                  </tr>

                  <tr>
                        <th>
                        <form name=form2 action=./controller.php method=post target=controller> Demande dont le budget est
                              < &agrave; <input type=number size=5 name=budget>
                                    <input type=hidden name=cas value=budgetInferieur>
                                    <input type=button value=Budget onclick=javascript:controle(form2,budget,budget);>
                        </form>
                        </th>
                  </tr>

                  <tr>
                        <th>
                        <form name=form3 action=./controller.php method=post target=controller> Demande dont le budget est
                              < &agrave; <input type=number name=budget>
                                    <br>et dont le genre est
                                    < &agrave; <br>
                                    <input type=text size=15 name=genre>
                                    <input type=hidden name=cas value=budgetGenre>
                                    <input type=button value=BudgetGenre onclick=javascript:controle(form3,budget,genre);>
                        </form>
                        </th>
                  </tr>

                  <tr>
                        <th>
                        <form name=form4 action=./controller.php method=post target=controller> id n&deg;
                              <input type=text size=5 name=ide>
                              <BR>
                              <input type=hidden name=cas value=modifier>
                              <input type=radio name=choix value=modifier>modifier
                              <BR>
                              <input type=radio name=choix value=supprimer>supprimer
                              <BR>
                              <input type=button name=bouton value=Choix? onclick=javascript:controle(form4,ide,ide);>
                        </form>
                        </th>
                  </tr>
            </table>
      </div>
      <br>
      <hr>
      <div id="formulaire">
      <h4>Action</h4>
            <table>
                  <tr>
                        <th>
                              <form action=./controller.php method=post target=controller>
                                    <input type=hidden name=cas value=insere>
                                    <input  type=submit value=ins&eacute;rer>
                              </form>
                        </th>
                  </tr>
            </table>
      </div>
      <br>
</div>

