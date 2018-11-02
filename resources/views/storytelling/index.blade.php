@extends('master')

@section('content')
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-content">
                <div class="text-center article-title">
                    <h1>
                        Tales of wonder and glory!
                    </h1>
                </div>


                <h2></h2>

                <p>
                    <i>
                        "With a pseudodragon curled on his shoulder, a young elf in golden robes smiles warmly, weaving a magical charm into his honeyed words and bending the palace sentinel to his will.
                    </i>
                </p>
                <p>
                    <i>
                        As flames spring to life in her hands, a wizened human whispers the secret name of her demonic patron, infusing her spell with fiendish magic.
                    </i>
                </p>
                <p>
                    <i>

                        Shifting his gaze between a battered tome and the odd alignment of the stars overhead, a wild-eyed tiefling chants the mystic ritual that will open a doorway to a distant world."
                    </i>
                </p>

                <h2>Storytelling demystified!</h2>

                <p>
                    Storytelling is a contest where you can share and read wonderful stories about Dungeons & Dragons
                    characters. The best stories are then selected into a top 5 after which a fresh voting round will
                    begin to determine the absolute winner.
                </p>

                <p>
                    The contest is split up into 4 phases.
                </p>

                <ul>
                    <li>Creation</li>
                    <li>Voting</li>
                    <li>Sudden Death</li>
                    <li>Results</li>
                </ul>

                <div style="margin-bottom: 10px;">
                    <h2 style="margin-bottom: 0px;">Creation</h2>
                    <span class="text-muted"><i class="fa fa-clock-o"></i> {{ $phases[1]['start'] }} - {{ $phases[1]['end'] }} </span>
                </div>

                <p>
                    During this time contestant will be able to create their unique story that they want to share with
                    the world! All contestants are able to edit their story until they are satisfied.
                </p>

                <div style="margin-bottom: 10px;">
                    <h2 style="margin-bottom: 0px;">Voting</h2>
                    <span class="text-muted"><i class="fa fa-clock-o"></i> {{ $phases[2]['start'] }} - {{ $phases[2]['end'] }} </span>
                </div>

                <p>
                    Pens down!<br>
                    Now it is time to read he stories of your fellow writers. You are able to visit each contestants
                    story and vote on the ones you like the most! Who will rise to the top? Will it be the elf with
                    a fear for bunnies? Or will it be the tough human barbarian with the scar shaped like an axe?
                </p>

                <div style="margin-bottom: 10px;">
                    <h2 style="margin-bottom: 0px;">Sudden Death</h2>
                    <span class="text-muted"><i class="fa fa-clock-o"></i> {{ $phases[3]['start'] }} - {{ $phases[3]['end'] }} </span>
                </div>

                <p>
                    Only the fittest survive the trails of storytelling! The top 5 has now been selected. All votes
                    will be reset to 0 and a new voting round will start. After this final voting round the winner
                    will be selected as the Lore Master of Wizards of the Coast.
                </p>

                <div style="margin-bottom: 10px;">
                    <h2 style="margin-bottom: 0px;">Results</h2>
                    <span class="text-muted"><i class="fa fa-clock-o"></i> {{ $phases[1]['start'] }} </span>
                </div>

                <p>
                    The winner will be announced and the final rankings will be revealed.
                </p>

                <p><strong>Good luck adventurers!</strong></p>

            </div>
        </div>
    </div>
@endsection