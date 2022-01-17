<?php
    /**@var Array $data */
?>

<div class="row margin-off">

    <div class="col-lg-8 p-3">
        <div class="div-inner">
            <h1>
                Welcome to Music Charts
            </h1>
            <p>
                On our page you can find songs and albums charts.
                If you will register on our page, you can become contributor of our music database.
                And what's more, you can create your own playlists.
                We can all think of at least one song that, when we hear it, triggers an emotional response.
                It might be a song that accompanied the first dance at your wedding, for example, or a song that reminds you of a difficult break-up or the loss of a loved one.
                Given the deep connection we have with music, it is perhaps unsurprising that numerous studies have shown it can benefit our mental health.
                A 2011 study by researchers from McGill University in Canada found that listening to music increases the amount of dopamine produced in the brain – a mood-enhancing chemical, making it a feasible treatment for depression.
                And earlier this year, MNT reported on a study published in The Lancet Psychiatry that suggested listening to hip-hop music – particularly that from Kendrick Lamar – may help individuals to understand mental health disorders.
            </p>

        </div>
    </div>

    <div class="col-lg-4 p-3">
        <div class="div-inner">
            <h2>
                Recently added songs
            </h2>

            <hr>

            <div class="padding-10 center-align">
                <div id="carouselSongs" class="carousel slide carousel-fade carousel-image" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselSongs" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselSongs" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselSongs" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <?php $i = 0;
                        foreach ($data['songs'] as $song) {
                            if($i == 0) { ?>
                                <div class="carousel-item active">
                                    <img src="<?=$song->tryGetCoverPath()?>" class="d-block w-100" alt="song-cover">
                                </div>
                            <?php } else {?>
                                <div class="carousel-item">
                                    <img src="<?=$song->tryGetCoverPath()?>" class="d-block w-100" alt="song-cover">
                                </div>
                            <?php }
                            $i++;
                        } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselSongs" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselSongs" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>

<div class="row margin-off">

    <div class="col-lg-4 p-3">
        <div class="div-inner">
            <h2>
                Recently added albums
            </h2>

            <hr>

            <div class="padding-10 center-align">
                <div id="carouselAlbums" class="carousel slide carousel-fade carousel-image" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselAlbums" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselAlbums" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselAlbums" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <?php $i = 0;
                        foreach ($data['albums'] as $album) {
                            if($i == 0) { ?>
                                <div class="carousel-item active">
                                    <img src="<?=$album->tryGetCoverPath()?>" class="d-block w-100" alt="album-cover">
                                </div>
                            <?php } else {?>
                                <div class="carousel-item">
                                    <img src="<?=$album->tryGetCoverPath()?>" class="d-block w-100" alt="album-cover">
                                </div>
                            <?php }
                            $i++;
                        } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselAlbums" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselAlbums" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-8 p-3">
        <div class="div-inner">
            <p>
                Celine Dion has canceled her upcoming North American tour due to continued recovery from recent health issues, the singer announced Saturday.
                The North American leg of the Courage World Tour was scheduled to begin March 9 in Denver and run through April 22. However, Dion has “recently has been treated for severe and persistent muscle spasms which are preventing her from performing, and her recovery is taking longer than she hoped,” her site said Saturday.
                Dion said in a statement, “I was really hoping that I’d be good to go by now, but I suppose I just have to be more patient and follow the regimen that my doctors are prescribing. There’s a lot of organizing and preparation that goes into our shows, and so we have to make decisions today which will affect the plans two months down the road.”
                Rather than postponing the dates, the North American shows have been canceled, with ticket holders automatically refunded for their purchase. The European leg of the Courage World Tour is still scheduled to begin on May 25 in Birmingham, England.
                “I’ll be so glad to get back to full health, as well as all of us getting past this pandemic, and I can’t wait to be back on stage again,” Dion added.
            </p>

        </div>
    </div>
</div>



<div class="col-lg-12 p-3">
    <div class="div-inner">
        <p>
            On DaBaby’s biggest song, he asked himself to switch the flow. He didn’t. “BOP” hurtled forward like he’d been shot from a cannon. His potent, barraging raps sound like they’re spurting out of him; the joke goes that they’re all different versions of the same song. DaBaby aims to be everywhere at once: on remixes of any Spotify chart-topper, coursing through TikTok, following pop culture wherever it leads. Of course he put out an album in the middle of quarantine—on the cover, he poses in a face mask, declaring his relevance to The Current Moment.
            Blame It on Baby reaches for more and resonates less. Half the album is stacked with the same regurgitated phrases and flows from earlier projects, stale the third time around; for the rest, DaBaby follows formulas other than his own. Though he’s known for being a capital-R Rapper, DaBaby clears his throat—literally, before admitting, “My voice kinda fucked up”—and tries to sing, sometimes with grating results. On “Rockstar,” he doesn’t imitate Roddy Ricch as much as adjust his tone to complement the feature. His voice becomes softer, as close as DaBaby gets to tender, as he talks about the physical jolt of PTSD, “waking up in cold sweats like the flu.” On “Find My Way,” he dribbles syllables over languid guitar. He follows A Boogie’s lead on “Drop,” catatonic and crooning. This is the first music he’s released that sounds limp.
            Some of that slowness comes from trudging through the murk of non-apologies and fledging repentance. DaBaby apparently slapped a woman at a recent event; in January, he was arrested for allegedly robbing someone and then pouring apple juice on them. Aggression is a key facet of DaBaby’s music, fueling his viciousness and velocity, and it’s often cartoonish; still, the record’s glimpses of violence can become disconcerting, especially when they involve women (“Put my dick down her throat ’til she throw up,” he raps on “Lightskin Shit”). “Can’t Stop,” the album opener, is weighed down by DaBaby’s insistence that he’s not sorry. On “Sad Shit,” he mimics a generic, desolate Drake song, soaking his voice in AutoTune and rasping pleas.
        </p>
    </div>
</div>

