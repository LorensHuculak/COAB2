<?php 

$userspic = new User($db);
$item = $userspic->getProfilePicture();

  if (!empty($_POST)) {
      
            $updateUser = new User($db);
      
            

        $updateUser->setUsername($_POST['username']);
        $updateUser->setEmail($_POST['email']);
      $updateUser->setPicture($_FILES['picture']['name']);
      
    $updateUser->editProfile();
      $updateUser->uploadPicture();
      

           
  }
    



?>


    <div class="col g-ml-45 g-ml-0--lg g-pb-65--md ">
        <div class="g-pa-20 ">
            <div class="row ">
                <div class="col-md-3 g-mb-30 g-mb-0--md ">
                    <div class="h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md ">
                        <!-- User Information -->
                        <section class="text-center g-mb-30 g-mb-50--md ">
                            <div class="d-inline-block g-pos-rel g-mb-20 ">
                                <a class="u-badge-v2--lg u-badge--bottom-right g-width-32 g-height-32 g-bg-lightblue-v3 g-bg-primary--hover g-mb-20 g-mr-20 " href="#! ">
                                    <i class="hs-admin-pencil g-absolute-centered g-font-size-14 g-color-white "></i>
                                </a>
                                <img class="g-width-200 img-fluid rounded-circle " src="assets/img/uploads/<?php echo htmlspecialchars($item[0]['picture']);?>" alt="Image description ">
                            </div>

                            <h3 class="g-font-weight-300 g-font-size-20 g-color-black mb-0 "><?php 
                  $username = htmlspecialchars($_SESSION["username"]);
                  echo $username; 
                  
                
?></h3>
                        </section>
                        <!-- User Information -->

                        <!-- Profile Completion
                                        <section class="g-mb-30 g-mb-50--md ">
                                            <h4 class="media h6 g-font-weight-400 g-mb-15 ">
			<span class="d-flex align-self-center g-color-gray-dark-v6 ">Profile Completion</span>
			<span class="media-body align-self-center text-right g-color-gray-dark-v6 ">75%</span>
		</h4>

                                            <div class="progress g-height-4 g-rounded-2 ">
                                                <div class="progress-bar g-bg-lightblue-v4 g-rounded-3 " role="progressbar " style="width: 60% " aria-valuenow="60 " aria-valuemin="0 " aria-valuemax="100 "></div>
                                            </div>
                                        </section>
                                        <!-- End Profile Completion -->

                        <!-- Profile Sidebar -->
                        <section>
                            <ul class="list-unstyled mb-0 ">
                                <li class="g-brd-top g-brd-gray-light-v7 mb-0 ">
                                    <a class="d-flex align-items-center u-link-v5 g-parent g-py-15 active " href="../app-views/app-profile.html ">
                                        <span class="g-font-size-18 g-color-gray-light-v6 g-color-primary--parent-hover g-color-primary-v3--parent-active g-mr-15 ">
						<i class="hs-admin-user "></i>
					</span>
                                        <span class="g-color-gray-dark-v6 g-color-primary--parent-hover g-color-primary--parent-active ">Profile Information</span>
                                    </a>
                                </li>






                                <li class="g-brd-top g-brd-gray-light-v7 mb-0 ">
                                    <a class="d-flex align-items-center u-link-v5 g-parent g-py-15 " href="../app-views/app-profile-invite.html ">
                                        <span class="g-font-size-18 g-color-gray-light-v6 g-color-primary-v3--parent-hover g-color-primary-v3--parent-active g-mr-15 ">
						<i class="hs-admin-announcement "></i>
					</span>
                                        <span class="g-color-gray-dark-v6 g-color-primary--parent-hover g-color-primary--parent-active ">Invite Members</span>
                                    </a>
                                </li>

                            </ul>
                        </section>
                        <!-- End Profile Sidebar -->
                    </div>

                </div>

                <div class="col-md-9 ">
                    <div class="h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md ">
                        <form enctype="multipart/form-data" method="post" class="g-pa-30 g-mb-30">
                            <header>
                                <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0 ">General information</h2>
                            </header>

                            <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-30--md ">

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#firstName ">Username</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="form-group g-pos-rel mb-0 ">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                          <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                        </span>
                                        <input id="username" name="username" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="text " value="Lorens " required="required " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success " aria-required="true ">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#lastName ">Name</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="form-group g-pos-rel mb-0 ">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                          <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                        </span>
                                        <input id="lastName " name="name" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="text " value="Huculak " required="required " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success " aria-required="true ">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 ">I’m</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="row g-mx-minus-10 ">
                                        <div class="col-md-auto align-self-center g-width-180--md g-px-10 ">
                                            <div class="form-group u-select--v2 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0 ">
                                                <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                              <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                            </span>
                                                <select class="js-select u-select--v2-select w-100 " required="required " style="display: none; ">
                                                    <option value="Male " selected="selected ">Male</option>
                                                    <option value="Female ">Female</option>
                                                    <option value="Others ">Others</option>
                                                </select>
                                                <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto g-mr-15 "></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 ">Birthdate</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="row g-mx-minus-10 ">
                                        <div class="col-md align-self-center g-px-10 g-mb-20 g-mb-0--md ">
                                            <div class="form-group u-select--v2 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0 ">
                                                <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                              <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                            </span>
                                                <select class="js-select u-select--v2-select w-100 " required="required " style="display: none; ">
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option>March</option>
                                                    <option>Juni</option>
                                                    <option>May</option>
                                                    <option selected="selected ">June</option>
                                                    <option>July</option>
                                                    <option>August</option>
                                                    <option>September</option>
                                                    <option>October</option>
                                                    <option>November</option>
                                                    <option>December</option>
                                                </select>
                                                <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto g-mr-15 "></i>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-auto align-self-center g-width-100--md g-px-10 ">
                                            <div class="form-group u-select--v2 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0 ">
                                                <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                              <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                            </span>
                                                <select class="js-select u-select--v2-select w-100 " required="required " style="display: none; ">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option selected="selected ">10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                    <option>15</option>
                                                    <option>16</option>
                                                    <option>17</option>
                                                    <option>18</option>
                                                    <option>19</option>
                                                    <option>20</option>
                                                    <option>21</option>
                                                    <option>22</option>
                                                    <option>23</option>
                                                    <option>24</option>
                                                    <option>25</option>
                                                    <option>26</option>
                                                    <option>27</option>
                                                    <option>28</option>
                                                    <option>29</option>
                                                    <option>30</option>
                                                    <option>31</option>
                                                </select>
                                                <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto g-mr-15 "></i>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-auto align-self-center g-width-135--md g-px-10 ">
                                            <div class="form-group u-select--v2 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0 ">
                                                <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                              <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                            </span>
                                                <select class="js-select u-select--v2-select w-100 " required="required " style="display: none; ">
                                                    <option>1900</option>
                                                    <option>1901</option>
                                                    <option>1902</option>
                                                    <option>1903</option>
                                                    <option>1904</option>
                                                    <option>1905</option>
                                                    <option>1906</option>
                                                    <option>1907</option>
                                                    <option>1908</option>
                                                    <option>1909</option>
                                                    <option>1910</option>
                                                    <option>1911</option>
                                                    <option>1912</option>
                                                    <option>1913</option>
                                                    <option>1914</option>
                                                    <option>1915</option>
                                                    <option>1916</option>
                                                    <option>1917</option>
                                                    <option>1918</option>
                                                    <option>1919</option>
                                                    <option>1920</option>
                                                    <option>1921</option>
                                                    <option>1922</option>
                                                    <option>1923</option>
                                                    <option>1924</option>
                                                    <option>1925</option>
                                                    <option>1926</option>
                                                    <option>1927</option>
                                                    <option>1928</option>
                                                    <option>1929</option>
                                                    <option>1930</option>
                                                    <option>1931</option>
                                                    <option>1932</option>
                                                    <option>1933</option>
                                                    <option>1934</option>
                                                    <option>1935</option>
                                                    <option>1936</option>
                                                    <option>1937</option>
                                                    <option>1938</option>
                                                    <option>1939</option>
                                                    <option>1940</option>
                                                    <option>1941</option>
                                                    <option>1942</option>
                                                    <option>1943</option>
                                                    <option>1944</option>
                                                    <option>1945</option>
                                                    <option>1946</option>
                                                    <option>1947</option>
                                                    <option>1948</option>
                                                    <option>1949</option>
                                                    <option>1950</option>
                                                    <option>1951</option>
                                                    <option>1952</option>
                                                    <option>1953</option>
                                                    <option>1954</option>
                                                    <option>1955</option>
                                                    <option>1956</option>
                                                    <option>1957</option>
                                                    <option>1958</option>
                                                    <option>1959</option>
                                                    <option>1960</option>
                                                    <option>1961</option>
                                                    <option>1962</option>
                                                    <option>1963</option>
                                                    <option>1964</option>
                                                    <option>1965</option>
                                                    <option>1966</option>
                                                    <option>1967</option>
                                                    <option>1968</option>
                                                    <option>1969</option>
                                                    <option>1970</option>
                                                    <option>1971</option>
                                                    <option>1972</option>
                                                    <option>1973</option>
                                                    <option>1974</option>
                                                    <option>1975</option>
                                                    <option>1976</option>
                                                    <option>1977</option>
                                                    <option>1978</option>
                                                    <option>1979</option>
                                                    <option>1980</option>
                                                    <option>1981</option>
                                                    <option>1982</option>
                                                    <option>1983</option>
                                                    <option>1984</option>
                                                    <option>1985</option>
                                                    <option>1986</option>
                                                    <option>1987</option>
                                                    <option>1988</option>
                                                    <option>1989</option>
                                                    <option>1990</option>
                                                    <option>1991</option>
                                                    <option>1992</option>
                                                    <option>1993</option>
                                                    <option>1994</option>
                                                    <option>1995</option>
                                                    <option selected="selected ">1996</option>
                                                    <option>1997</option>
                                                    <option>1998</option>
                                                    <option>1999</option>
                                                    <option>2000</option>
                                                    <option>2001</option>
                                                    <option>2002</option>
                                                    <option>2003</option>
                                                    <option>2004</option>
                                                    <option>2005</option>
                                                    <option>2006</option>
                                                    <option>2007</option>
                                                    <option>2008</option>
                                                    <option>2009</option>
                                                    <option>2010</option>
                                                    <option>2011</option>
                                                    <option>2012</option>
                                                    <option>2013</option>
                                                    <option>2014</option>
                                                    <option>2015</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                </select>
                                                <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto g-mr-15 "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#email ">Email</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="form-group g-pos-rel mb-0 ">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                          <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                        </span>
                                        <input id="email " name="email" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="email " value="lorens.huculak@gmail.com " required="required " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success " aria-required="true ">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#confirmEmail ">Confirm Email</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="form-group g-pos-rel mb-0 ">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                          <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                        </span>
                                        <input id="confirmEmail " name="confirmEmail " class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="email " value="lorens.huculak@gmail.com " required="required " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success " aria-required="true ">
                                    </div>
                                </div>
                            </div>



                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#phone ">Phone Number</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="row g-mx-minus-10 ">
                                        <div class="col-auto align-self-center g-width-270 g-px-10 ">
                                            <div class="form-group g-pos-rel mb-0 ">
                                                <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                              <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                            </span>
                                                <input id="phone " name="phone " class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="tel " value="+32 472 05 37 65 " required="required " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success " aria-required="true ">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#phone ">File Input</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="row g-mx-minus-10 ">
                                        <div class="col-auto align-self-center g-px-10 ">
                                            <input type="file" name="picture" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                        </div>


                                    </div>
                                </div>
                            </div>




                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#location ">Your Location</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="u-tagsinput--v2--blue g-brd-around g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-4 g-px-6 g-py-5">
                                        <input type="text" value="Developement, Software, Html, Css" data-role="tagsinput">
                                    </div>
                                </div>
                            </div>


                            <!--   <div class="row g-mb-20 ">
                                                <div class="col-md-3 align-self-center "></div>

                                                <div class="col-md-9 align-self-center ">
                                                    <a class="btn btn-link d-flex align-self-center align-items-center u-link-v5 g-color-lightblue-v3 g-color-lightblue-v4--hover g-brd-none p-0 " href="#! ">
                                                        <i class="hs-admin-plus g-font-size-17 "></i>
                                                        <span class="g-font-weight-300 g-ml-10 ">Add Phone Number</span>
                                                    </a>
                                                </div>
                                            </div> -->

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 ">Your Language</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="row g-mx-minus-10 ">
                                        <div class="col-auto align-self-center g-width-270 g-px-10 ">
                                            <div class="form-group u-select--v2 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0 ">
                                                <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                              <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                            </span>
                                                <select name="language " class="js-select u-select--v2-select w-100 " required="required " style="display: none; ">
                                                    <option data-content='<span class="d-flex align-items-center "><img class="g-width-20 g-height-20 rounded-circle g-mr-8 " src="assets/img/langs/us.png " alt="Image Description "><span class="g-line-height-1 g-color-black ">English</span></span>'>English</option>
                                                    <option data-content='<span class="d-flex align-items-center "><img class="g-width-20 g-height-20 rounded-circle g-mr-8 " src="assets/img/langs/de.png " alt="Image Description "><span class="g-line-height-1 g-color-black ">Deutsche</span></span>'>Deutsche</option>
                                                    <option data-content='<span class="d-flex align-items-center "><img class="g-width-20 g-height-20 rounded-circle g-mr-8 " src="assets/img/langs/ru.png " alt="Image Description "><span class="g-line-height-1 g-color-black ">Русский</span></span>'>Русский</option>
                                                </select>
                                                <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto g-mr-15 "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-mb-60 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 ">Default Currency</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="row g-mx-minus-10 ">
                                        <div class="col-auto align-self-center g-width-270 g-px-10 ">
                                            <div class="btn-group justified-content ">
                                                <label class="u-check ">
                                                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 " name="currency " type="radio " checked="checked ">
                                                    <span class="btn btn-md btn-block u-btn-outline-lightgray g-bg-lightblue-v3--checked g-font-size-16 g-color-white--checked g-rounded-0--top-right g-rounded-0--bottom-right g-py-10 ">$</span>
                                                </label>
                                                <label class="u-check ">
                                                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 " name="currency " type="radio ">
                                                    <span class="btn btn-md btn-block u-btn-outline-lightgray g-bg-lightblue-v3--checked g-font-size-16 g-color-white--checked g-brd-left-none--md rounded-0 g-py-10 ">€</span>
                                                </label>
                                                <label class="u-check ">
                                                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 " name="currency " type="radio ">
                                                    <span class="btn btn-md btn-block u-btn-outline-lightgray g-bg-lightblue-v3--checked g-font-size-16 g-color-white--checked g-brd-left-none--md rounded-0 g-py-10 ">£</span>
                                                </label>
                                                <label class="u-check ">
                                                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 " name="currency " type="radio ">
                                                    <span class="btn btn-md btn-block u-btn-outline-lightgray g-bg-lightblue-v3--checked g-font-size-16 g-color-white--checked g-brd-left-none--md g-rounded-0--top-left g-rounded-0--bottom-left g-py-10 ">¥</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <header>
                                <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0 ">Change password</h2>
                            </header>

                            <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-30--md ">


                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#newPassword ">New Password</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="form-group g-pos-rel mb-0 ">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                          <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                        </span>
                                        <input id="newPassword " name="newPassword " class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="password " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success ">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#confirmNewPassword ">Confirm Password</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="form-group g-pos-rel mb-0 ">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                          <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                        </span>
                                        <input id="confirmNewPassword " name="confirmNewPassword " class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="password " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success ">
                                    </div>
                                </div>
                            </div>

                            <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-30--md ">

                            <div>
                                <button class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mb-10 " type="submit ">Save Changes</button>
                                <button class="btn btn-md btn-xl--md u-btn-outline-gray-dark-v6 g-font-size-12 g-font-size-default--md g-mr-10 g-mb-10 " type="reset ">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>