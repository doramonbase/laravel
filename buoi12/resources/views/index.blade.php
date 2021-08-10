@extends('layouts/master')

@section('content')
<div class="container clearfix" style="padding: 0px">
    <div class="people-list" id="people-list">
      <div class="search">
        <input type="text" placeholder="search" />
        <i class="fa fa-search"></i>
      </div>
      <ul class="list">
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
          <div class="about">
            <div class="name">Vincent Porter</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>
        
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_02.jpg" alt="avatar" />
          <div class="about">
            <div class="name">Aiden Chavez</div>
            <div class="status">
              <i class="fa fa-circle offline"></i> left 7 mins ago
            </div>
          </div>
        </li>
        
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_03.jpg" alt="avatar" />
          <div class="about">
            <div class="name">Mike Thomas</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>
        
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_04.jpg" alt="avatar" />
          <div class="about">
            <div class="name">Erica Hughes</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>
        
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_05.jpg" alt="avatar" />
          <div class="about">
            <div class="name">Ginger Johnston</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>
        
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_06.jpg" alt="avatar" />
          <div class="about">
            <div class="name">Tracy Carpenter</div>
            <div class="status">
              <i class="fa fa-circle offline"></i> left 30 mins ago
            </div>
          </div>
        </li>
        
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_07.jpg" alt="avatar" />
          <div class="about">
            <div class="name">Christian Kelly</div>
            <div class="status">
              <i class="fa fa-circle offline"></i> left 10 hours agoooooooooooo
            </div>
          </div>
        </li>
        
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_08.jpg" alt="avatar" />
          <div class="about">
            <div class="name">Monica Ward</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>
        
        
      </ul>
    </div>
    
    <div class="chat">
      <div class="chat-header clearfix">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />
        
        <div class="chat-about">
          <div class="chat-with">Chat with Vincent Porter</div>
          <div class="chat-num-messages">already 1 902 messages</div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      
      <div class="chat-history">
        <ul>
          <li class="clearfix">
            <div class="message other-message float-right">
              Hi Vincent, how are you? How is the project coming along?
            </div>
          </li>
          
          <li>
            <div class="message my-message">
              Are we meeting today? Project has been already finished and I have results to show you.
            </div>
          </li>
          
          <li class="clearfix">
              <div class="message other-message float-right">
                  Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so? Have you faced any problems at the last phase of the project?
              </div>
          </li>
          
          <li > 
            
            <div class="message my-message">
               A ctually everything was fine. I'm very excited to show this to our team.
            </div>
          </li>
          
          <li class="clearfix">
            <div class="message other-message float-right">
              A ctually everything was fine. I'm very excited to show this to our team.
            </div>
          </li>
          
          <li class="clearfix">
            <div class="message other-message float-right">
              adsdasd
            </div>
          </li>
          <li class="clearfix">
            <div class="message other-message float-right">
              adsdasd
            </div>
          </li>
          <li class="clearfix">
            <div class="message other-message float-right">
              adsdasd
            </div>
          </li>

          <li > 
            
            <div class="message my-message">
                A ctually everything was fine. I'm very excited to show this to our team.
            </div>
          </li>
          <li > 
            
            <div class="message my-message">
                A ctually everything was fine. I'm very excited to show this to our team.
            </div>
          </li>
        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix position-absolute bottom-0 start-50 translate-middle-x">
        <div class="input-group mb-3">
          <textarea type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"></textarea>
          <button type="button" class="btn"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
        
      </div> <!-- end chat-message -->
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->

  <script>
    $(document).ready(function(){
      $('textarea').each(function () {
        this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
      }).on('input', function () {
        this.style.height = '38px';
        this.style.height = (this.scrollHeight) + 'px';
        
        if($('textarea').outerHeight() == 38){
          $('.chat-history').css('height', 'calc(100% - 97px - 74px)');
        }
        if($('textarea').outerHeight() == 60){
          $('.chat-history').css('height', 'calc(100% - 97px - 96px)');
        }
        if($('textarea').outerHeight() == 80){
          $('.chat-history').css('height', 'calc(100% - 97px - 116px)');
        }
      });
    });
    
  </script>

@endsection