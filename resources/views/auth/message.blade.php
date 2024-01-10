<!-- Nav Item - Messages -->
<li class="nav-item dropdown no-arrow mx-1" id="limsg">
    <a class="nav-link dropdown-toggle" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        <span class="badge badge-danger badge-counter">{{ $nbmessages }}</span>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">
            Message Center
        </h6>
        @if ($messages->isNotEmpty())
            @foreach ($messages as $index => $msg)
                {{-- <a class="dropdown-item d-flex align-items-center" href="{{route('certificate.valider',$msg->CertPasser->id_CertP,$msg->user->id_U)}}"> --}}
                <div name='messages' @if ($index > 4) style="display: none;" @endif>
                    <a class="dropdown-item d-flex align-items-center" {{-- style="display: none" --}}
                        href="{{ route('certificate.valider', $msg->id_Mess) }}">

                        <div class="dropdown-list-image mr-3">
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px; height: 40px; background-color: black; color: white;">
                                {{ strtoupper(substr($msg->user->FirstName ?? '', 0, 1) . substr($msg->user->LastName ?? '', 0, 1)) }}
                            </div>
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate"
                                @if ($msg->lire === 1) style="font-weight: normal;" @endif>Salut! Je me
                                demande
                                si vous pouvez valider mon test en
                                {{-- {{ $msg->CertPasser->certificateName }}  --}}
                                .</div>
                            <div class="small text-gray-500">{{ $msg->user->FirstName }}
                                {{ $msg->user->LastName }} · {{ $msg->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <p>No messages found.</p>
        @endif


        {{-- <a class="dropdown-item d-flex align-items-center">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                <div class="status-indicator"></div>
            </div>
            <div>
                <div class="text-truncate">I have the photos that you ordered last month, how
                    would you like them sent to you?</div>
                <div class="small text-gray-500">Jae Chun · 1d</div>
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                <div class="status-indicator bg-warning"></div>
            </div>
            <div>
                <div class="text-truncate">Last month's report looks great, I am very happy
                    with
                    the progress so far, keep up the good work!</div>
                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" alt="...">
                <div class="status-indicator bg-success"></div>
            </div>
            <div>
                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                    told me that people say this to all dogs, even if they aren't good...</div>
                <div class="small text-gray-500">Chicken the Dog · 2w</div>
            </div>
        </a> --}}
        <a class="dropdown-item text-center small text-gray-500" name='readmore'>Read More
            Messages</a>
    </div>
</li>
