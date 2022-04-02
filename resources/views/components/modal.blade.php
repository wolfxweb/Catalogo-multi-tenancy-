      <!-- Modal -->
      <div class="modal fade" id="{{ $modalID }}" tabindex="-1" aria-labelledby="{{ $modalID }}Label"
          aria-hidden="true">
          <div class="modal-dialog ">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="{{ $modalID }}Label">{{ $modalTitulo }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      {{ $slot }}
                  </div>
              </div>
          </div>
      </div>
      <!-- Modal -->
