<div class="col-md-4">
  <div class="card card-lightblue ">
      <div class="card-header">
          <h3 class="card-title">Listado de Razas</h3>
      </div>
      <div class="card-body p-0 m-0">
         <div class="table-responsive">
          <table class="table-table-hover table condensed">
              <thead>
                  <tr>
                      <th>Nombre</th>
                      <th>Acciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($razas as $raza)
                      <tr>
                          <td>{{ $raza->raza_mascota }}</td>
                          <td>
                            <a 
                                href="{{ route('raza.edit', ['id'=>$raza->id] ) }}" 
                                class="btn btn-sm btn-success">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            @if( $raza->trashed())
                              <a  
                                href="{{ route('raza.restore', ['info'=>$raza->id]) }}" 
                                class="btn btn-sm btn-warning">
                                <i class="fas fa-undo"></i>
                                </a>
                              @else  
                              <a 
                                href="{{ route('raza.delete', ['info'=>$raza->id]) }}" 
                                class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i>
                              </a>
                            @endif
                        </td>
                      </tr>
                   @endforeach   
              </tbody>
          </table>
         </div> 
      </div>
  </div>
</div>




