<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Certificado de Adopción</title>
</head>
<body class="cont">
    <header>
        <div class="logo">
            <div>
                <img src="{{asset('assets/img/logo3.jpg')}}" alt="">
            </div>
            <div class="text-center">
                <h4><u>Certificado de Adopción Mascota</u></h4>
            </div>
        </div>
    </header>

    <section class="mt-4">
        <h6 class="mb-3">Datos Adoptante</h6>
       <table class="table table-bordered">
            <tbody class="g">
                <tr>
                <th>Nombres</th>
                <td>{{$info->usuario->nombre_usuario}}</td>
                <th>Apellidos</th>
                <td>{{$info->usuario->apellido_paterno.' '.$info->usuario->apellido_materno}}</td>
                <th>Dirección</th>
                <td>{{$info->direccion_adopcion}}</td>
                </tr>
                <tr>
                <th>Rut</th>
                <td>{{$info->usuario->rut_usuario}}</td>
                <th>Teléfono</th>
                <td>{{$info->usuario->telefono_usuario}}</td>
                <th>Correo Electrónico</th>
                <td>{{$info->usuario->email_usuario}}</td>
                </tr>
            </tbody>
        </table>
    </section>
    <section class="mt-4">
        <h6 class="mb-3">Datos Mascota</h6>
       <table class="table table-bordered">
            <tbody class="g">
                <tr>
                <th>Nombre</th>
                <td>{{$info->mascota->nombre_mascota}}</td>
                <th>Raza</th>
                <td>{{$info->mascota->raza->raza_mascota}}</td>
                <th>Género</th>
                <td>{{$info->mascota->genero_mascota->genero_mascota}}</td>
                </tr>
                <tr>
                <th>Tamaño</th>
                <td>{{$info->mascota->tamano->tamano_mascota}}</td>
                <th>Personalidad</th>
                <td>{{$info->mascota->personalidad_mascota->personalidad_mascota}}</td>
                <th>Fecha Nacimiento</th>
                <td>{{$info->mascota->fecha_nacimiento_mascota->format('d-m-Y')}}</td>
                </tr>
            </tbody>
        </table>
        <p class="mt-2 h">El adoptante se compromete, mediante la firma de este contrato a:</p>
    </section>
    <section>
        <div>
            <ul class="text-justify x">
                <li>
                    Ofrecer los cuidados que necesite al animal, alimentarlo, sacarlo de paseo, llevarlo a hacer sus necesidades fuera del lugar de descanso y vivienda habitual, darle cobijo y tratarlo con respeto y cariño.
                </li>
                <li>Llevar un control sanitario, visitando a su veterinario para vacunaciones, desparasitaciones y por cualquier enfermedad que se le origine.</li>
                <li>No dejar libremente a la mascota por la vía pública, parque o campo, sin supervisión del propietario y siempre cogido con correa.</li>
                <li>Si es la primera vez que está al cargo de un animal, procurará informase lo mejor posible de los principios básicos a tener en cuenta para ofrecerle una vida digna.</li>
                <li>Nunca debe desatenderlo, hacerlo pelear o trabajar, ni criar con él.</li>
                <li>No debe abandonarlo, regalarlo, cederlo, venderlo, o sacrificarlo sin justificación veterinaria por enfermedad muy grave que lo obligue y sin previa autorización escrita del representante de la adopción.</li>
                <li>No realizará amputaciones de ningún tipo por motivos estéticos. Nunca debe pegarle, humillarle ni utilizarle con fines económicos.</li>
                <li>Es obligación del adoptante informar al representante de la adopción de cualquier cambio de domicilio que se produzca, de teléfono, o e-mail, defunción o pérdida del animal.</li>
                <li>El adoptante se hace cargo civilmente de su animal según la ley 21.020 Ley de tenencia responsable de mascotas.</li>
                <li>El adoptante permitirá estar al tanto de la condición del animal de mutuo acuerdo con el dueño anterior, con el fin de observar el estado de adaptación, condiciones generales del animal, reservándose el derecho a retirar la custodia del mismo si considera que no está adecuadamente atendido o no se cumpliese el actual contrato en alguno de sus puntos.</li>
                <li>En caso de que el adoptante no se encuentre capacitado algún día para continuar encargándose del animal adoptado, procederá a comunicarlo de inmediato, quien iniciará de nuevo los trámites para la búsqueda de un nuevo adoptante. En esta situación, el adoptante cuidará del animal mientras se le encuentra nuevo dueño, en caso de que en ese tiempo no pudiese recogerlo en casa de acogida alguna, de lo contrario deberá el adoptante hacerse cargo de los gastos que dicho acto ocasione. </li>
                <li>En caso de que sea retirado de la custodia del adoptante, el animal por cualquier motivo, y si el mismo presenta algún tipo de lesión o requiere tratamiento veterinario por falta de cuidados, enfermedad, o cualquier otro causados directa o indirectamente por el adoptante, por la presente éste acepta asumir todos los costes en los que se deberá incurrir para la recuperación del animal. </li>
            </ul>
        </div>
        <div class="text-justify">
            <p class="h"><strong>EL ADOPTANTE DECLARA:</strong> Estar conforme con las condiciones de adopción. Que las personas que viven en su domicilio, donde vivirá el animal adoptado, han sido informados previamente de su deseo de adoptar al mismo,  todos están de acuerdo en colaborar y cumplir las condiciones del contrato como <strong>ADOPTANTES</strong>. - Haber sido informado previamente del estado de salud, edad, carácter y características físicas del animal adoptado, y que esta adopción no responde a un impulso, sino a un acto meditado.</p>
        </div>
    </section>

    <section class="p-3 mt-2">
        <div class="text-center">
            <p class="float-left">_______________________________</p>
            <p class="float-right">_______________________________</p>
        </div>

        <br>
        <br>

        <<div class="f">
            <p class="float-left " >Firma Representante</p>
            <p class="float-right" >Firma Adoptador</p>
        </div>
    </section>




















</body>
</html>
