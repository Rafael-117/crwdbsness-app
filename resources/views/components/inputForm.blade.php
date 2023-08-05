 <div class="form-group form-floating-label">
     <input id="{{ $nombre }}" type="text" class="form-control input-border-bottom" required=""
         value="{{ old($nombre) ?? $valor }}" name="{{ $nombre }}" oninput="{{ $attr ?? '' }}">
     <label for="{{ $nombre }}" class="placeholder">{{ $titulo }}</label>
     @error($nombre)
         <span class="text-danger">
             <strong> {{ $message }} </strong>
         </span>
     @enderror
 </div>
