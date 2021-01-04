<footer class="mt-auto">
    <div class="row justify-content-center mb-0 pt-5 pb-0 row-2 px-3">
        <div class="col-12">
            <div class="row row-2">
                <div class="col-sm-3 text-md-center">
                    <h5><b>Powered by:</b></h5>
                    <img src="/images/CrC.png"  width="70" height="70" alt="">
                    <p>Chech-in, Relax, Check-out&trade;</p>
                </div>
                <div class="col-sm-3 my-sm-0 mt-5">
                    <ul class="list-unstyled">
                        <li><b>Contacts</b></li>
                        @foreach($contacts as $contact)
                            @if($contact->type == 'phone' || $contact->type == 'email')
                                <li>{{ $contact->contact_string }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-3 my-sm-0 mt-5">
                    <ul class="list-unstyled">
                        <li><b>Address</b></li>
                        @foreach($contacts as $contact)
                            @if($contact->type == 'address')
                                <li>{{ $contact->contact_string }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-3 my-sm-0 mt-5">
                    <ul class="list-unstyled">
                        <li><b>Social</b></li>
                        @foreach($contacts as $contact)
                            @if($contact->type == 'social')
                                <li>{{ $contact->contact_string }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</footer>

<style>
    footer {
        width: 100%;
    }
</style>
