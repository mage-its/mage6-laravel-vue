<template>
	<div>
		<v-container>
			<v-row>            
				<v-col cols="12 mx-auto" sm="8 mx-auto">                
					<div class="mainheading">
						<v-row class="post-top-meta">
							<v-col sm="2" cols="12">
								<a href="author.html"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
							</v-col>
							<v-col sm="10" cols="12 text-center text-sm-left">
								<a class="link-dark" href="author.html">Sal</a>
								<span class="author-description">Founder of WowThemes.net and creator of <b>"Mediumish"</b> theme that you're currently previewing. Developing professional premium themes, templates, plugins, scripts since 2012.</span>
								<span class="post-date">22 July 2017</span>
							</v-col>
						</v-row>
						<div class="posttitle text-h4 text-sm-h3 font-weight-medium">18 Things You Should Learn Before Moving Into a New Home</div>
					</div>

					<v-img class="featured-image" :src="require('../../assets/medium/10.jpg')" cover></v-img>

					<div class="article-post">
						{{ medium.konten }}
						<!-- <p>
							Holy grail funding non-disclosure agreement advisor ramen bootstrapping ecosystem. Beta crowdfunding iteration assets business plan paradigm shift stealth mass market seed money rockstar niche market marketing buzz market.
						</p>
						<p>
							Burn rate release facebook termsheet equity technology. Interaction design rockstar network effects handshake creative startup direct mailing. Technology influencer direct mailing deployment return on investment seed round.
						</p>
						<p>
							Termsheet business model canvas user experience churn rate low hanging fruit backing iteration buyer seed money. Virality release launch party channels validation learning curve paradigm shift hypotheses conversion. Stealth leverage freemium venture startup business-to-business accelerator market.
						</p>
						<blockquote>
							Gen-z strategy long tail churn rate seed money channels user experience incubator startup partner network low hanging fruit direct mailing. Client backing success startup assets responsive web design burn rate A/B testing metrics first mover advantage conversion.
						</blockquote>
						<p>
							Freemium non-disclosure agreement lean startup bootstrapping holy grail ramen MVP iteration accelerator. Strategy market ramen leverage paradigm shift seed round entrepreneur crowdfunding social proof angel investor partner network virality.
						</p> -->
					</div>
				</v-col>            
			</v-row>        
		</v-container>
		<v-container>
			<div class="footer">
				<p class="pull-left">
					Copyright &copy; 2020 Multimedia And Game Event 6 ITS
				</p>		
				<div class="clearfix">
				</div>
			</div>
		</v-container>
	</div>
</template>

<script>
export default {
    name: 'DetailMedium',
    data: () => ({
		medium:{}
	}),
	methods:{
		getKonten(){
			axios.get('/blog/Kebo-Jago-5')
				.then((response)=>{
					this.medium = response.data.medium
				})
		}	
	},
	created(){
		this.getKonten()
	}
}
</script>

<style scoped>
/*
Template Name:Mediumish
Copyright:WowThemes.net,https://www.wowthemes.net
Version:1.0.1
License: https://www.wowthemes.net/freebies-license/
gradasi:  #040D21 #7B2B8E #F148FB
*/
body {
	padding-top:5rem;
	background-attachment: fixed;
	/* background-image: url("../img/bg-pattern.png"); */
	background-size: cover;
	background-position: 0 50px;
	color: #040B21;
}
.mainheading {
	padding:1rem 0rem;
}
a {
	color: #003366;
	/* color:#00ab6b; */
}
a,a:hover {
	transition:all 0.2s;
}
.mediumnavigation {
	background:#040B21;
	box-shadow:0 2px 2px -2px rgba(0,0,0,.15);
}
section {
	margin-bottom:20px;
}
.section-title h2 {
	border-bottom:1px solid rgba(0,0,0,.15);
	margin-bottom:25px;
	font-weight:700;
	font-size:1.4rem;
	margin-bottom:27px;
}
.section-title span {
	border-bottom:1px solid rgba(0,0,0,.44);
	display:inline-block;
	padding-bottom:20px;
	margin-bottom:-1px;
}
@media (min-width:576px) {
	.card-columns.listfeaturedtag {
		-webkit-column-count:2;
		-moz-column-count:2;
		column-count:2;
	}
}
@media (min-width:992px) {
	.navbar-toggleable-md .navbar-nav .nav-link {
		padding-right:.7rem;
		padding-left:.7rem;
	}
}
.card-columns .card {
	margin-bottom:20px;
}
.card {
	background: #040B21
}
.listfeaturedtag .wrapthumbnail {
	height:258px;
	flex:0 0 auto;
}
.listfeaturedtag .card {
	border:1px solid rgba(0,0,0,.1);
	border-radius:2px;
	height:260px;
	padding-left:0;
	margin-bottom:15px;
}
.listfeaturedtag .thumbnail {
	background-size:cover;
	height:100%;
	display:block;
	background-position:38% 22% !important;
	background-origin:border-box!important;
	border-top-left-radius:2px;
}
.listfeaturedtag .card-block {
	padding-left:0;
}
.listfeaturedtag h2.card-title,.listrecent h2.card-title {
	font-size:1.3rem;
	font-weight:700;
	line-height: 1.25;
}
.listfeaturedtag h2.card-title a,.listrecent h2.card-title a {
	color:#E5E5E5;
}
.listfeaturedtag h2.card-title a:hover,.listrecent h2.card-title a:hover {
	text-shadow: 0px 0px 5px rgba(255, 255, 255, 1);
	text-decoration:none;
}
.listfeaturedtag h4.card-text,.listrecent h4.card-text {
	color:#E5E5E5;
	font-size:0.95rem;
	line-height:1.4;
	font-weight:400;
}
.listfeaturedtag .wrapfooter {
	position:absolute;
	bottom:20px;
	font-size:12px;
	display:block;
	width:85%;
}
.listrecent .wrapfooter {
	font-size:12px;
	margin-top:30px;
}
.author-thumb {
	width:40px;
	height:40px;
	float:left;
	margin-right:13px;
	border-radius:100%;
}
.post-top-meta {
	margin-bottom:2rem;
}
.post-top-meta .author-thumb {
	width:72px;
	height:72px;
}
.post-top-meta.authorpage .author-thumb {
	margin-top:40px;
}
.post-top-meta span {
	font-size:0.9rem;
	color:rgba(0,0,0,.44);
	display:inline-block;
}
.post-top-meta .author-description {
	margin-bottom:5px;
	margin-top:5px;
	font-size:0.95rem;
}
.author-meta {
	flex:1 1 auto;
	white-space:nowrap!important;
	text-overflow:ellipsis!important;
	overflow:hidden!important;
}
span.post-name,span.post-date,span.author-meta {
	display:inline-block;
}
span.post-date,span.post-read {
	color:#E5E5E5;
}
span.post-read-more {
	align-items:center;
	display:inline-block;
	float:right;
	margin-top:8px;
}
span.post-read-more a {
	color:rgba(0,0,0,.44);
}
span.post-name a,span.post-read-more a:hover {
	color:#E5E5E5;
}
span.post-read-more a {
	fill: #E5E5E5;
}
.dot:after {
	content:"·";
	margin-left:3px;
	margin-right:3px;
}
.mediumnavigation .form-control {
	font-size:0.8rem;
	border-radius:30px;
	overflow:hidden;
	border:1px solid rgba(0,0,0,0.04);
}
.mediumnavigation .form-inline {
	margin-left:15px;
}
.mediumnavigation .form-inline .btn {
	margin-left:-50px;
	border:0;
	border-radius:30px;
	cursor:pointer;
}
.mediumnavigation .form-inline .btn:hover,.mediumnavigation .form-inline .btn:active {
	background:transparent;
	color:green;
}
.mediumnavigation .navbar-brand {
	font-weight:500;
}
.mediumnavigation .dropdown-menu {
	border:1px solid rgba(0,0,0,0.08);
	margin:.5rem 0 0;
}
.mediumnavigation .nav-item,.dropdown-menu {
	font-size:0.9rem;
}
.mediumnavigation .search-icon {
	margin-left:-40px;
	display:inline-block;
	margin-top:3px;
	cursor:pointer;
}
.mediumnavigation .navbar-brand img {
	max-height:30px;
	margin-right:5px;
}
.mainheading h1.sitetitle {
	font-family:Righteous;
}
.mainheading h1.posttitle {
	font-weight:700;
	margin-bottom:1rem;
}
.footer {
	border-top:1px solid rgba(0,0,0,.05)!important;
	padding-top:15px;
	padding-bottom:12px;
	font-size:0.8rem;
	color:#040B21;
	margin-top:50px;
}
.link-dark {
	color:#040B21;
}
.article-post {
	/* font-family:Merriweather; */
	font-size:1.2rem;
	line-height:1.8;
	color:#040B21;
}
blockquote {
	border-left:4px solid #f148fb;
	padding:0 20px;
	font-style:italic;
	color:#040B21;
}
.article-post p,.article-post blockquote {
	margin:0 0 1.5rem 0;
}
.featured-image {
	display:block;
	margin:0px auto;
	margin-bottom:1.5rem;
}
.share {
	text-align:center;
	margin-top:20px;
}
.share p {
	margin-bottom:10px;
	font-size:0.95rem;
	color: #040B21;
}
.share {
	display:none;
}
.share ul li {
	display:inline-block;
	margin-bottom:5px;
}
.share ul li a {
	fill: #040B21;
	color: #040B21;
}
.share ul {
	padding-left:0;
	margin-left:0;
}
.svgIcon {
	vertical-align:middle;
}
@media (min-width:1024px) {
	.share {
		position:fixed;
		display:block;
	}
	.share ul li {
		display:block;
	}
}
@media (max-width:999px) {
	.listfeaturedtag .wrapthumbnail, .listfeaturedtag .col-md-7 {
		width:100%;
		max-width:100%;
		-webkit-box-flex: 0;
		-webkit-flex: 100%;
		-ms-flex: 100%;
		flex: 100%;
	}
	.listfeaturedtag .wrapthumbnail {
		height:250px;
	}
	.listfeaturedtag .card {
		height:auto;
	}
	.listfeaturedtag .wrapfooter {
		position:relative;
		margin-top:30px;
	}
	.listfeaturedtag .card-block {
		padding:20px;
	}
}
@media (max-width:1024px) {
	.post-top-meta .col-md-10 {
		text-align:center;
	}
}
@media (max-width:767px) {
	.post-top-meta.authorpage {
		text-align:center;
	}
}
.share,.share a {
	color:rgba(0,0,0,.44);
	fill:rgba(0,0,0,.44);
}
.graybg {
	background-color:rgba(255, 255, 255, 0.1);
	padding:40px 0 46px;
	position:relative;
}
.listrelated .card {
	box-shadow:0 1px 7px rgba(0,0,0,.05);
	border:0;
}
.card {
	border-radius:4px;
}
.card .img-thumb {
	border-top-right-radius:4px;
	border-top-left-radius:4px;
}
ul.tags {
	list-style:none;
	padding-left:0;
	margin:0 0 3rem 0;
}
ul.tags li {
	display:inline-block;
	font-size:0.9rem;
}
ul.tags li a {
	background:#040B21;
	color:#E5E5E5;
	border-radius:3px;
	padding:5px 10px;
	transition: 0.3s;
}
ul.tags li a:hover {
	text-shadow: 0px 0px 15px white;
	text-decoration:none;
}
.margtop3rem {
	margin-top: 3rem;
}
.sep {
	height:1px;
	width:20px;
	background:#040B21;
	margin:0px auto;
	margin-bottom:1.2rem;
}
.btn.follow {
	border-color:#003366;
	color:#003366;
	padding:3px 10px;
	text-align:center;
	border-radius:999em;
	font-size:0.85rem;
	display:inline-block;
}
.btn.subscribe {
	background-color:#f148fb;
	border-color:#f148fb;
	color:rgba(255,255,255,1);
	fill:rgba(255,255,255,1);
	border-radius:30px;
	font-size:0.85rem;
	margin-left:10px;
	font-weight:600;
	text-transform:uppercase;
}
.post-top-meta .btn.follow {
	margin-left:5px;
	margin-top:-4px;
}
.alertbar {
	box-shadow:0 -3px 10px 0 rgba(0,0,0,.0785);
	position:fixed;
	bottom:0;
	left:0;
	background-color:#040D21;
	width:100%;
	padding:14px 0;
	z-index:1;
	color: #E5E5E5;
}
.alertbar-logo {
	width: 50px;
}
.form-control::-webkit-input-placeholder {
	color: rgba(0,0,0,.5);
}
.form-control:-moz-placeholder {
	color: rgba(0,0,0,.5);
}
.form-control::-moz-placeholder {
	color: rgba(0,0,0,.5);
}
.form-control:-ms-input-placeholder {
	color: rgba(0,0,0,.5);
}
.form-control::-ms-input-placeholder {
	color: rgba(0,0,0,.5);
}
.authorpage h1 {
	font-weight:700;
	font-size:30px;
}
.post-top-meta.authorpage .author-thumb {
	float:none;
}
.authorpage .author-description {
	font-size:1rem;
	color:#040B21;
}
.authorpage .author-description a{
	color: #003366;
}
.post-top-meta span {
	color: #040B21;
}
.post-top-meta.authorpage .btn.follow {
	padding:7px 20px;
	margin-top:10px;
	margin-left:0;
	font-size:0.9rem;
}
.graybg.authorpage {
	border-top:1px solid #f0f0f0;
}
.authorpostbox {
	width:760px;
	margin:0px auto;
	margin-bottom:1.5rem;
	max-width:100%;
}
.authorpostbox .img-thumb {
	width:100%;
}
.sociallinks {
	margin:1rem 0;
}
.sociallinks a {
	background:#666;
	color:#fff;
	width:22px;
	height:22px;
	display:inline-block;
	text-align:center;
	line-height:22px;
	border-radius:50%;
	font-size:12px;
}
.nav-link {
	color: #F5D300 !important;
}
.nav-link:hover {
	text-shadow: 0px 0px 10px rgba(255, 255, 255, 1);
}
.active {
	font-weight: bold;
}
.toggler-img {
	width: 30px;
}

</style>