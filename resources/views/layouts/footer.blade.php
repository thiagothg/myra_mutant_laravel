<?php

    use App\Models\Helper;


?>


<footer class="footer">
    <div class="container p-4">
        <div class="row justify-content-between">
            <div class="col">
                <div class="page-footer font-small blue">
                    <span class="text-muted"> &copy; Myra. Thiago Rodrigues</span>
                </div>
            </div>

            
            <div class="col ">
                <div class="d-flex justify-content-end">
                    <div class="">
                        <a href="{{ Helper::URL_REPO }}" target="_blank">
                            <i class="fab fa-github fa-2x text-dark"></i> 
                        </a>
                    </div>

                    <div class="ms-3">
                        <a href="{{ Helper::URL_REPO }}" target="_blank">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    
        <br>
    </div>
</footer>