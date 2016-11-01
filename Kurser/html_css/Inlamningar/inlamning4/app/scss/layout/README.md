.flex-nav {
	ul {
		font-size: 20px;
		list-style: none;
		margin: 0;
		padding: 0;
		display: flex;
		flex-wrap: wrap;
		background: $black_20;
		font-weight: bold;
		&.open {
			display: flex;
			text-align: center;
			justify-content: center;
			
		}
		li:hover > ul {
			display: flex;
			z-index: 200;
			max-width: 100%;
		}
	}
	li {
		flex-basis: 100%;
	}

	.sub1 ul{
		display: none;
	}
	.sub2 ul{
		display: none;
	}
}
.toggleNav {
	display: block;
	background: $black_20;
	li {
		display: flex;
		flex: 1;
		justify-content: center;
		align-items: center;
		align-content: center;
		text-align: center;
	}
}
.flex-nav .social {
	flex: 1 1 25%;
	order: -1;
}
a {
	color: $white;
	font-weight: 100;
	letter-spacing: 2px;
	text-decoration: none;
	background: $black_20;
	padding: 20px 5px;
	display: inline-block;
	width: 100%;
	text-align: center;
	transition: all 0.5s;
	&:hover {
		background: $black_30;
	}
}