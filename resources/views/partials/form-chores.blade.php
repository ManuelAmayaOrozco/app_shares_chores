@vite('resources/css/user_styles/register_styles.css')
<main class="main__register">
    <form class="register__register_form {{ $errors->any() ? 'register__register_form-error' : '' }}" action="{{ route('chore.doRegisterChore') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" placeholder="Enter name">
            @error('name') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input class="form-control" type="text" name="description" placeholder="Enter description">
            @error('description') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="assigned_to">Assigned to ID:</label>
            <input type="number" class="form-control" name="assigned_to" placeholder="Enter ID of person that this chore is assigned to">
            @error('assigned_to') <small class="register_form__error">{{ $message }}</small> @enderror
            @error('credentials') <small class="login_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="due_date">Due date:</label>
            <input type="datetime-local" class="form-control" name="due_date" placeholder="Enter date when the chore is due">
            @error('due_date') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
</main>