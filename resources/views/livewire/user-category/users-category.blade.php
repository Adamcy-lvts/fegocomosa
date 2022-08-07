<div>

    <div class="container mx-auto w-8/12">
        <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-3 md:gap-6">
            @foreach ($users as $member)
                <div class="cards">

                    <div class="cards-image waves-effect waves-block waves-light">
                        <img class="" src="{{ asset('storage/photos/' . $member->potrait_image) }}" />
                    </div>
                    <div class="cards-content">
                        <span class="cards-title activator grey-text text-darken-4">
                            {{ $member->first_name . ' ' . $member->last_name }}<i class="material-icons right"></i>
                        </span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="cards-reveal">
                        <span class="cards-title grey-text text-darken-4">Card Title<i
                                class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
    </div>

</div>
