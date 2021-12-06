<div class="sidebar-widget newsletter wow fadeInUp ">
        <p>Sign Up for Our Newsletter!</p>
        <form  action="{{route('addSubscribers')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email address">
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone number">
            </div>
            <button class="btn btn-primary">Subscribe</button>
        </form>

</div><!-- /.sidebar-widget -->
