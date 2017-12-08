
@extends('layout')




@section('cabecera')
    <style>
        .contact-form input:focus,.contact-form textarea:focus {
            background: #09d6ff;
        }

        .contact-wrap{
            background: rgba(150, 150, 150, 0.5);
            padding-top: 30px;
            border-radius: 30px;
        }
    </style>
    <section id="contact-info">
        <div class="center">
            <h2>How to Reach Us?</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 text-center">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104844.29047065829!2d-58.46245050438209!3d-34.796277838639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd33f82a3cea1%3A0x5743efedb778032d!2sGrupo+Todo!5e0!3m2!1ses!2sar!4v1508207353594" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                    <p class="col-sm-4 map-content">
                        <ul class="row">
                            <li class="col-sm-5">
                                <address>
                                    <h5>Oficinas</h5>
                                    <p>Int. Gonzalez 1185 (ex Canale)<br>
                                        , Adrogué – BS AS.</p>
                                    <p>Tel: (011) 4214 2212<br>
                                        Email:info@grpotodo.com.ar</p>
                                    <p>Horario de atención:<br>  Lunes a Viernes de 9 a 18hs</p>
                                </address>


                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

    <section id="contact-page">
        <div class="container">
            <div class="center">
                <h2>Drop Your Message</h2>
                <p class="lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row contact-wrap">
                <div class="status alert alert-success" style="display: none"></div>
                @if(session()->has('flash'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>EMAIL!  </strong> Su mensaje fue recibido
                    </div>
                @endif
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="{{ route('mensajes') }}">
                    {{ csrf_field() }}
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Nombre *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Asunto *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Mensaje *</label>
                            <textarea name="duda" id="duda" required="required" class="form-control" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Enviar consulta</button>
                        </div>
                    </div>
                </form>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->


@stop