@extends('user.layouts.app')
@section('content')
<style>

	.episode-nav {
		height: 110px;
		background-color: #fff;
		border-radius: 4px 4px 0 0;
		overflow: hidden;
		box-shadow: 0 0 6px #ddd;

	}

	.upper-episode-nav {
		height: 60px;
	}

	.lower-episode-nav {
		height: 50px;
		border-bottom: 1px solid #000;
		z-index: 2;
	}

	.episode-name,
	.episode-course {
		float: right;
		width: 33%;
		height: 100%;
	}

	.episode-name h2 {
		margin: 10px 5% 10px 0;
		line-height: 40px;
	}

	.episode-time {
		float: right;
		width: 34%;
	}

	.episode-time p {
		line-height: 28px;
		text-align: center;
		font-size: 12pt;
		color: #5B5B5B;
	}

	.episode-course button {
		float: left;
		margin-left: 5%;
		margin-top: 12px;
		width: 150px;
		height: 36px;
		font-size: 9.8pt;
		border-radius: 4px;
		border: none;
		box-shadow: 0 0 4px #eee;
		background-color: #0096EB;
		color: #fff;
	}

	.prev-next {
		float: right;
		width: 50%;
		height: 100%;
	}


	.prev-next button {
		margin-top: 10px;
		width: 90px;
		height: 30px;
		font-size: 9pt;
		border-radius: 4px;
		border: none;
		box-shadow: 0 0 6px #eee;
		background-color: rgba(0, 0, 0, 0.7);
		color: #fff;
	}

	.prev button {
		margin-left: 8%;
		float: left;
	}

	.next button {

		margin-right: 8%;
		float: right;
	}

</style>

<div class=" row episode-nav">
	<div class="upper-episode-nav">
		<div class="episode-name">
			<h2>قسمت اول</h2>
		</div>
		<div class="episode-time">
			<p>زمان جلسه : ۶۰ دقیقه</p>
		</div>
		<div class="episode-course">
			<button>بازگشت به صفحه دوره</button>
		</div>
	</div>
	<div class="lower-episode-nav">
		<div class="prev-next prev">
			<button>قسمت قبلی</button>
		</div>
		<div class="prev-next next">
			<button>قسمت بعدی</button>
		</div>
	</div>


</div>

<style>
	.video-box{
		width: 80%;
		float: right;
		background-color: #fff;
		height: auto;
		
	
	}
	.episodes-box{
		width: 20%;
		float: left;
		background-color: #fff;
		box-shadow: 0px 3px 6px #ddd;
		height: 595px;
		overflow: scroll;

		
	}
	.episodes-box ul{
		
	}
.episodes-header{
	margin: 0px 3%;
    border-bottom: 1px solid #aaa;

}
.episodes-header h3{
	margin: 14px 1%;
    font-size: 11pt;
}

.episodes-list li{
	width: 100%;
    height: 70px;
	margin-bottom: 1px;
	margin-top: 1px ;
}
.episodes-list li a{
	width: 96%;
    display: block;
    height: 100%;
    line-height: 70px;
    padding-right: 4%;
    text-decoration: none;
    color: #615E5E;
font-size: 10pt;
}

</style>
<div class="row">
	<div class="video-box">
		<video width="100%" height="auto" controls autoplay>
			<source src="{{ asset('uploads/videos/user/wheat-field.mp4') }}" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
	<div class="episodes-box">
		<div class="episodes-header" >
			<h3>تمامی قسمت ها</h3>
		</div>
		<div class="episodes-list">
			<ul>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
				<li><a href="">قسمت اول</a></li>
			</ul>
		</div>
	</div>
</div>

<style>
.share-download-box {
    height: 80px;
    background: #fff;
    border-radius: 0 0 4px 4px;
    overflow: hidden;
    box-shadow: 0 4px 6px #ddd;
}

.share-box, .download-box{
	float: right;
    width: 33%;
    height: 100%;
}

.share-box p{
	margin-right: 4%;
    margin-top: 4px;
    font-size: 9.5pt;
    color: #727272;
	height: 26%;
}
.share-box ul{
	height: 48%;
}
.share-box li{
	height: 100%;
    float: right;
    width: 15%;
    margin-right: 4%;
}

.download-box a{
	margin: 20px auto;
    width: 120px;
    height: 45px;
    font-size: 9pt;
    border-radius: 4px;
    box-shadow: 0 0 6px #eee;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    display: block;
    text-align: center;
    line-height: 45px;
}

.like-box a{
	margin: 20px auto;
    width: 120px;
    height: 45px;
    font-size: 9pt;
    border-radius: 4px;
    box-shadow: 0 0 6px #eee;
    background-color: green;
    color: #fff;
    display: block;
    text-align: center;
    line-height: 45px;
}

.like-box{
	float: right;
    width: 34%;
    height: 100%;
}

</style>

 <div class="row share-download-box">
	<div class="download-box">
		<a href="">دانلود ویدیو</a>
	</div>
	<div class="like-box">
		<a href="">۵   
 		<i class="fa fa-heart fa-1x" aria-hidden="true"></i>

		</a>
	</div>
	<div class="share-box">
		<p>اشتراک گذاری:</p>
		<ul>
		
			<li><a href=""><i class="fa fa-telegram fa-2x" aria-hidden="true"></i></a></li>
			<li><a href=""><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a></li>
			<li><a href=""><i class="fa fa-link fa-2x" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</div>


<div>
	<div>
		<h3>Comments</h3>
	</div>

	<div>
		<div>
			<h4>username</h4>
			<p>date</p>
		</div>
		<div>
			<p>content of comment</p>
		</div>
	</div>
</div>

<script>

</script>
@endsection