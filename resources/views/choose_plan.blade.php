<div class="row">
    <div class="col-lg-3 col-sm-12 col-sm-12">

    </div>
    <div class="col-lg-3 col-sm-12 col-sm-12">

    </div>
    <div class="col-lg-3 col-sm-12 col-sm-12">

    </div>
</div>

@auth
<span > Hi: {{auth()->user()->first_name}}</span>
@endauth

<form method='post' action='/logout'>
              @csrf
              <a href=''><button type='submit' class='butt'>Logout</button> </a>
</form>
<form method="post" action="/ops">
    @csrf
    @method('PUT')
    <label for="goal">Goal</label> <br />
    <input type='text' name='goal'  /><br />
    <label for="amount">Amount</label> <br />
    <input type='text' name='amount'  /><br />
    <label for="start">start</label>
    <input type='date' name='start' />
    <label for="end">end</label>
    <input type='date' name='end' />
    <br />
    <input type="radio" id="html" name="freq" value="weekly">
<label for="html">Weekly</label><br>
<input type="radio" id="css" name="freq" value="monthly">
<label for="css">Monthly</label><br>
<button type="submit" class='but'>just</button>
</form>

<script>
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("end")[0].setAttribute('min', today);
document.getElementsByName("start")[0].setAttribute('min', today);
</script>   
