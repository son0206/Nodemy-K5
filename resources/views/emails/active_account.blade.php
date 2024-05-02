<div>
    <h2>Xin chao {{$user->name}}</h2>
    <p>Kích hoạt tài khoản vui lòng ấn vào nút bên dưới</p>
    <p>
        <a href="{{route('user.actived',['user'=>$user->id,'token'=>$user->token])}}">
            Nhấn vào để kích hoạt
        </a>
    </p>
</div