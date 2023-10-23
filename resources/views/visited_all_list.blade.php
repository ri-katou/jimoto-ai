@extends('layout')
@section('content')
<div class="post-all-list">
  <div class="post-list-header">
    <div class="list-head">
      <a href="{{route('home.post.check')}}">
        <div class="post-syoukaijou-head container">
          <div class="post-img"><img src="/image/mail8.svg" alt="free-svg" class="free-svg post-list-head-img-rgba"></div>
          <div class="post-head-font">投稿した紹介状</div>

        </div>
      </a>
    </div>
    <div class="list-head">
      <a href="{{route('home.interest.check')}}">
        <div class="post-syoukaijou-head container">
          <div class="post-img"><img src="/image/hart2.svg" alt="free-svg" class="free-svg post-list-head-img-rgba"></div>
          <div class="post-head-font">行ってみたい</div>

        </div>
      </a>
    </div>
    <div class="list-head list-head-back">
      <a href="{{route('home.visit.check')}}">
        <div class="post-syoukaijou-head container">
          <div class="post-img"><img src="/image/goal.svg" alt="free-svg" class="free-svg"></div>
          <div class="post-head-font post-underline-green">行ったよ</div>

        </div>
      </a>
    </div>
  </div>
  <div class="all-list">
    <div class="post-all-space">
      <div class="syoukaijougrit">
        <div class="post-grid">
                    {{-- ここから紹介状１枚 --}}
                    <div class="syoukaijou-card">
                      @foreach ($visitedAll as $item)
                          <div class="syou" data-id="{{ $item->syoukaijous_id }}" data-interest="{{ $item->interest_count ?: 0 }}"
                              data-visited="{{ $item->visited_count ?: 0 }}">
                              <div class="syoukaijou-sam">
                                  <a class="syoukaijou-link" href="{{ route('syoukaijou.disp', ['id' => $item->syoukaijous_id]) }}">
          
                                      <div class="preview-syoukaijou-top-sam">
                                          <div class="sum-top">
                                              <div class="syoukaijou-day-sam">{{ $item->create_day }}</div>
                                              <div class="syoukaijou-title-sam underline-green">{{ $item->title }}</div>
                                          </div>
                                          <div class="janru-area-sam">
                                              <div class="janru-tag">
                                                  {{ $item->category_name }}
                                              </div>
                                              <div class="area-tag">
                                                  <div class="area-sub">{{ $item->municipalities_name }}</div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="preview-main-sam">
                                          <div class="preview-pics-sam">
                                              <div class="preview-pic1-sam"><img id="gazo" src="{{ $item->image1 }}"></div>
                                          </div>
                                          <div class="preview-honbun">
                                              <div class="honbun-sum">{{ $item->body }}</div>
                                          </div>
                                      </div>
                                  </a>
                                  <div class="fav_btn" id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}">
                                      <div class="fav_btn-interest">
                                          <i onclick="interest(this)" data-id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}"
                                              class="fav_btn-interest-icon fas fa-heart 
              @foreach ($interest_list as $value)
              @if ($item->syoukaijous_id == $value->syoukaijou_id)
              interest-active
              @endif @endforeach"></i>
                                          <div class="interest-count">
                                              {{ $item->interest_count }}
                                          </div>
                                      </div>
          
                                      <div class="fav-btn-visited">
                                          <i onclick="visited(this)" data-id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}"
                                              class="fav_btn-visited-icon fas fa-flag 
              @foreach ($visited_list as $value)
              @if ($item->syoukaijous_id == $value->syoukaijou_id)
              visited-active
              @endif @endforeach
              "></i>
                                          <div class="visited-count">
                                              {{ $item->visited_count }}
                                          </div>
                                      </div>
                                  </div>
                              </div>
          
          
                          </div>
                      @endforeach
                  </div>
                  {{-- ここまで紹介状1枚 --}}
                  </div>
                </div>
                <div class="pagenate">
                    {{ $visitedAll->links() }}
                    </div>
              </div>
            </div>
          </div>
          <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
              <script>
              // 行ってみたいボタン
                   function interest (icon) {
                      let $interestIcon = icon;
                      var origin = location.origin;
                      var $syoukaijouId = $interestIcon.dataset.id;
                      var $myId = $interestIcon.dataset.me;
                      console.log($myId);
                      $.ajaxSetup({
                          headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
                      });
                      $.ajax({
                          url: origin + "/interest ",
                          type: 'post',
                          data: {
                              'syoukaijou_id': $syoukaijouId,
                              'user_id': $myId,
                          }, success: function (data) {
                              if (data == 1) {
                                  $interestIcon.classList.add('interest-active');
                                  let countNow = Number($interestIcon.nextElementSibling.textContent);
                                  $interestIcon.nextElementSibling.textContent = countNow + 1;
                              } else {
                                  $interestIcon.classList.remove('interest-active');
                                  let countNow = Number($interestIcon.nextElementSibling.textContent);
                                  $interestIcon.nextElementSibling.textContent = countNow - 1;
                              }
                          }
                      });
                      return false;
                  }
                  // 行ったよボタン
                  function visited(icon){
                      let $visitedIcon = icon;
                      var origin = location.origin;
                      var $syoukaijouId = $visitedIcon.dataset.id;
                      var $myId = $visitedIcon.dataset.me;
                      console.log($myId);
                      $.ajaxSetup({
                          headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
                      });
                      $.ajax({
                          url: origin + "/visited ",
                          type: 'post',
                          data: {
                              'syoukaijou_id': $syoukaijouId,
                              'user_id': $myId,
                          }, success: function (data) {
                              if (data == 1) {
              
                                  $visitedIcon.classList.add('visited-active');
                                  let countNow = Number($visitedIcon.nextElementSibling.textContent);
                                  $visitedIcon.nextElementSibling.textContent = countNow + 1;
                              } else {
                                  $visitedIcon.classList.remove('visited-active');
                                  let countNow = Number($visitedIcon.nextElementSibling.textContent);
                                  $visitedIcon.nextElementSibling.textContent = countNow - 1;
                              }
                          }
                      });
                      return false;
                  }
          
              </script>
@endsection