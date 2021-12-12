<?php
namespace partials;

function footer()
{
    ?>
            </main>
            <footer class="text-center p-3">
                <span class="text-muted"> &copy;amateni</span>
            </footer>
        </div>
        <!-- bootstrap-datepicker -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ja.min.js"></script>
        <script src="<?php echo BASE_JS_PATH ?>vendor/chart.js"></script>
        <script src="<?php echo BASE_JS_PATH ?>pie-chart.js"></script>
        <script src="<?php echo BASE_JS_PATH ?>form-validate.js"></script>
        <script src="<?php echo BASE_JS_PATH ?>ajax.js"></script>
        <script src="<?php echo BASE_JS_PATH ?>googlemap-api.js"></script>
        <script src="<?php echo BASE_JS_PATH ?>datepicker.js"></script>
        <script src="<?php echo BASE_JS_PATH ?>search.js"></script>
        <!-- googlemap api -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfDNKw9N8qwH3qg2q1liO43UnrchbcjiQ&libraries=places&callback=initMap" async defer></script>

    </body>
    </html>
<?php
}
?>