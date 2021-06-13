<template>
	<div class="background--yellow">
		<vue-headful
            title="Blog | MAGE6"
            description="Page for Mage6 Blog"
        />
		<v-container>
		<div class="mainheading">
			<h1 class="sitetitle">Multimedia and Game Event</h1>
			<p class="lead">
				Informate Computer Engineer to You
			</p>
		</div>
	<!-- End Site Title
	================================================== -->

		<!-- Begin Featured
		================================================== -->
		<!-- End Featured
		================================================== -->

		<!-- Begin List Posts
		================================================== -->
		<section class="recent-posts">
		<div class="section-title">
			<h2><span>All Stories</span></h2>
		</div>
		
		<v-row class="justify-center">
			<v-col lg="4" v-for="datamed in allmedium" :key="datamed.id">
				<v-card class="card mx-auto d-flex flex-column justify-space-between" width="357" height="475">
					<v-img :src="require('../../../public/medium/'+datamed.path_gambar)" max-height="237px"></v-img>
					<router-link :to = "{name: 'BlogDetail', params:{judul: datamed.judul.split(' ').join('-')}}" style="text-decoration: none"><v-card-title class="white--text pt-2 pb-2">{{datamed.judul.substr(0,30) + " ...."}}</v-card-title></router-link>
					<v-card-text class="white--text">                    
						{{ datamed.konten.split(' ').splice(1, 15).join(' ') + " ..." }}
					</v-card-text>
					<v-card-subtitle class="pt-0 pt-sm-2">
						<div class="metafooter">
							<div class="wrapfooter">
								<span class="meta-footer-thumb">
								<v-img class="author-thumb" :src="require('../../../public/medium/logomage.png')" cover></v-img>
								</span>
									<span class="author-meta">
									<span class="post-name white--text">MAGE6</span><br/>
									<span class="post-date">{{datamed.created_at.slice(0,10)}}</span><span class="dot"></span>
								</span>                            
							</div>
						</div>
					</v-card-subtitle>                                
				</v-card>
			</v-col>                
		</v-row>
		</section>
		<!-- End List Posts
		================================================== -->

		<!-- Begin Footer
		================================================== -->
		<div class="footer">
			<p class="pull-left">
				Copyright &copy; 2020 Multimedia and Game Event
			</p>		
			<div class="clearfix">
			</div>
		</div>
		<!-- End Footer
		================================================== -->

		</v-container>
	</div>
</template>
<script>
const axios = require('axios');
export default {
    name: 'Blog',
    data: () => ({
		allmedium:{}		
	}),
	methods:{
		getAllData(){
			axios.get('/getdatamedium/')
				.then((response)=>{
					// console.log(response.data.allmedium);
                    if(response.data.allmedium.length == 0){
                        window.location = "/home"
                    }
                    else{
                        this.allmedium = response.data.allmedium
                    }                    
				})                    
		}	
	},
	created(){
		this.getAllData()
	}
}
</script>

<style scoped>

.mainheading {
	padding:1rem 0rem;
}
.background--yellow{
	background-color: #f5d300 !important;	
}
a {
	color: #003366;
	/* color:#00ab6b; */
}
a,a:hover {
	transition:all 0.2s;
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


.card {
	background: #040B21
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
	float: right;
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
.footer {
	border-top:1px solid rgba(0,0,0,.05)!important;
	padding-top:15px;
	padding-bottom:12px;
	font-size:0.8rem;
	color:#040B21;
	margin-top:50px;
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
</style>