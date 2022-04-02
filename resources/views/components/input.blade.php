<div class="form-floating mb-3 ">
    <input
      name="{{$name}}"
      type="{{$type}}"
      class="form-control @error($name) is-invalid     @enderror "
      id="floatingInput"
      placeholder="{{$tilulo}}"
      value="{{$value}}">
    <label for="floatingInput">{{$tilulo}}</label>
    @error($name)
     <p class="text-danger" >{{$message}} </p>
    @enderror
</div>
