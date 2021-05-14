<!-- Basic Validation -->
<x-back.errors></x-back.errors>
<x-back.success></x-back.success>

<div class="form-group form-float">
    <div class="form-line">
        <label for="fname">First Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="fname" name="fname"
            value="{{ old('fname', $user->name ?? null) }}" required>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <label for="lname">First Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="lname" name="lname"
            value="{{ old('lname', $user->lname ?? null) }}" required>
    </div>
</div>

 <div class="form-group form-float">
    <div class="form-line">
        <label for="select-role"> Role <span class="text-danger">*</span></label>
        <select id="select-role" class="form-control show-tick" name="role">
            <option value="">-- Please select --</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}"
                 @isset($user)
                      @if ($user->role_id == $role->id )
                        selected="selected"
                    @endif
                 @endisset
                    >{{ $role->label }} </option>
            @endforeach
        </select>
    </div>
</div> 

<div class="form-group form-float">
    <div class="form-line">
        <label for="email">Email <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="email" name="email"
            value="{{ old('email', $user->email ?? null) }}" required>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <label for="phone">Phone <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="phone" name="phone"
            value="{{ old('phone', $user->phone ?? null) }}" required>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <label for="address">Address <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="address" name="address"
            value="{{ old('address', $user->address ?? null) }}" required>
    </div>
</div>

@if(!isset($user))
<div class="form-group form-float">
    <div class="form-line">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>
    
@endif

<div class="form-group">
    <input type="checkbox" id="confirm" name="confirm">
    <label for="confirm">I confirm all informations</label>
</div>



<!-- #END# Basic Validation -->
