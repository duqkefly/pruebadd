<div class="col-md-7 mx-auto mt-5">
    <div class="row">
        <div class="col-6">
            <div id="msje" class="alert alert-" role="alert"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form id="myForm">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Indique su email">
                    <span id="msje-1"></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Indique su password">
                    <span id="msje-2"></span>
                </div>                
                <div class="row">
                    <div class="col">
                        <!-- <div class="float-md-right"><a href="main/restorePassword">Recuperar password</a></div> -->
                    </div>                    
                </div>
                <div class="form-group">
                    <input type="hidden" name="token" class="form-control" id="token">
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
        </div>
    </div>
</div>