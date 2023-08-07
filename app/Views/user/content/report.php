<!-- start of Report -->
<section id="report">
    <div class="report pb-5">
        <div class="container">
            <h1 class="pt-5">Report</h1>
            <div class="container row align-items-center">

                <div class="col-md-6 col-12">
                    <form action="/submit" method="post">
                        <div class="row">
                            <div class="field">
                                <label for="textarea" class="form-label">Report</label>
                                <textarea class="form-control box mb-4" id="pesan" name="pesan" rows="5"></textarea>
                                <label for="select" class="form-label">Services</label>
                                <select class="form-select box" id="service" name="service" aria-label="Default select example">
                                    <?php foreach ($services as $service) : ?>
                                        <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col text-center">
                                <button type="submit" class="btn submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-12 text-center text-md-end">
                    <img data-aos-duration="1000" data-aos="flip-right" class="modelreport" src="/assets/User/img/modelreport.png" alt="models" />
                </div>
            </div>
        </div>
    </div>
</section>