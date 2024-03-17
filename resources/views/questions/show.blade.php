<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>question</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Questions
                    </div>
                    <div class="card-body">

                        <h1>Create Student</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('questions.store') }}" method="POST"> @csrf <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="birth">Date of Birth:</label>
                                <input type="date" name="birth" id="birth" class="form-control"
                                    value="{{ old('birth') }}">
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <select name="subject" id="subject" class="form-control"
                                    value="{{ old('subject') }} required>
                <option value="">Select
                                    Subject</option>
                                    <option value="CSE">CSE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="CIVIL">CIVIL</option>
                                </select>
                            </div>

                            {{-- <div class="form-group form-check">
                                <input type="checkbox" name="marketing_agree" id="marketing_agree"
                                    class="form-check-input">
                                <label for="marketing_agree" class="form-check-label">Marketing Agreement</label>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" name="welse_agree" id="welse_agree" class="form-check-input">
                                <label for="welse_agree" class="form-check-label">Welse Agreement</label>
                            </div> --}}
                            {{-- <div class="form-group form-check">
                                <input type="checkbox" name="marketing_agree" id="marketing_agree"
                                    class="form-check-input" {{ old('marketing_agree') ? 'checked' : '' }}> <label
                                    for="marketing_agree" class="form-check-label">Marketing Agreement</label>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" name="welse_agree" id="welse_agree" class="form-check-input"
                                    {{ old('welse_agree') ? 'checked' : '' }}> <label for="welse_agree"
                                    class="form-check-label">Welse Agreement</label>
                            </div> --}}
                            <div class="form-check form-switch">
                                <input type="hidden" name="marketing_agree" value="0"> <!-- Hidden field with value 0 -->
                                <input type="checkbox" name="marketing_agree" id="marketing_agree" class="form-check-input" value="1">
                                <label for="marketing_agree" class="form-check-label">Do You want to agree to marketing updates</label>
                            </div>
                            
                            <div class="form-check form-switch">
                                <input type="hidden" name="welse_agree" value="0"> <!-- Hidden field with value 0 -->
                                <input type="checkbox" name="welse_agree" id="welse_agree" class="form-check-input" value="1">
                                <label for="welse_agree" class="form-check-label">Do you want correspondence in welse</label>
                            </div>

                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" name="location" id="location" class="form-control"
                                    value="{{ old('location') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
