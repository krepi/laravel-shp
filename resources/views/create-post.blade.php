<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/store-post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bran" class="text-muted mb-1"><small>Marka</small></label>
                <input required name="brand" id="post-title" class="form-control form-control-sm text-muted" type="text" placeholder="" autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="model" class="text-muted mb-1"><small>Model</small></label>
                <input required name="model" id="post-title" class="form-control form-control-sm text-muted" type="text" placeholder="" autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="mileage" class="text-muted mb-1"><small>Przebieg</small></label>
                <input required name="mileage" id="post-title" class="form-control form-control-sm text-muted" type="number" placeholder="" autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="fuel" class="text-muted mb-1"><small>Paliwo</small></label>
                <select required name="fuel" id="post-title" class="form-control form-control-sm text-muted " type="text" placeholder="w" autocomplete="off" >
                    <option value="select">Wybierz rodzaj paliwa</option>
                    <option value="benzyna">benzyna</option>
                    <option value="diesel">diesel</option>
                    <option value="lpg">lpg</option>
                    <option value="electric">electric</option>
                </select>
            </div>
            <div class="form-group">
                <label for="body" class="text-muted mb-1"><small>Rodzaj Nadwozia</small></label>
                <input required name="body" id="post-title" class="form-control form-control-sm text-muted" type="text" placeholder="" autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="colour" class="text-muted mb-1"><small>Kolor</small></label>
                <input required name="colour" id="post-title" class="form-control form-control-sm text-muted" type="text" placeholder="" autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="price" class="text-muted mb-1"><small>Cena</small></label>
                <input required name="price" id="post-title" class="form-control form-control-sm text-muted" type="number" placeholder="" autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="contact" class="text-muted mb-1"><small>Kontakt</small></label>
                <input required name="contact" id="post-title" class="form-control form-control-sm text-muted" type="text" placeholder="telefonu, mail " autocomplete="off" />
            </div>


            <div class="form-group">
                <label for="description" class="text-muted mb-1"><small>Opis (wyposa??enie itd)</small></label>
                <textarea required name="description" id="post-body" class="body-content tall-textarea form-control" type="text"></textarea>
            </div>
            <label for="description" class="text-muted mb-1"><small>Zdjecia</small></label>
            <div class="container container--narrow py-md-5 form-group" >

                <input class="mb-3" type="file" name="image1" >
                <input class="mb-3" type="file" name="image2">
                <input class="mb-3" type="file" name="image3">
                <input class="mb-3" type="file" name="image4">
            </div>
            <button class="btn btn-primary btn-lg">Stw??rz Og??oszenie</button>
        </form>
    </div>
</x-layout>
