  <div class="chart-row three">
      <div class="chart-container-wrapper">
          <div class="chart-container">
              <div class="chart-info-wrapper">
                  <h2>Total Members</h2>

                  <span>{{ $allMembers }}</span>
              </div>
              <div class="chart-svg">
                  <svg viewBox="0 0 36 36" class="circular-chart pink">
                      <path class="circle-bg"
                          d="M18 2.0845
                            a 15.9155 15.9155 0 0 1 0 31.831
                            a 15.9155 15.9155 0 0 1 0 -31.831">
                      </path>
                      <path class="circle" stroke-dasharray="{{ $percentage }}, 100"
                          d="M18 2.0845
                            a 15.9155 15.9155 0 0 1 0 31.831
                            a 15.9155 15.9155 0 0 1 0 -31.831">
                      </path>
                      <text x="18" y="20.35" class="percentage">{{ $percentage }}%</text>
                  </svg>
              </div>
          </div>
      </div>
      <div class="chart-container-wrapper">
          <div class="chart-container">
              <div class="chart-info-wrapper">
                  <h2>Logins Today</h2>

                  <span>{{ $logins }}</span>
              </div>
              <div class="chart-svg">
                  <svg viewBox="0 0 36 36" class="circular-chart blue">
                      <path class="circle-bg"
                          d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                      </path>
                      <path class="circle" stroke-dasharray="{{ $loginPercentage }}, 100"
                          d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                      </path>
                      <text x="18" y="20.35" class="percentage">{{ round($loginPercentage, 2) }}%</text>
                  </svg>
              </div>
          </div>
      </div>
      <div class="chart-container-wrapper">
          <div class="chart-container">
              <div class="chart-info-wrapper">

                  <h2> Registerd Today</h2>
                  <span>{{ $registeredToday }}</span>
              </div>
              <div class="chart-svg">
                  <svg viewBox="0 0 36 36" class="circular-chart green">
                      <path class="circle-bg"
                          d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                      </path>
                      <path class="circle" stroke-dasharray="{{ $todayPercentage }}, 100"
                          d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                      </path>
                      <text x="18" y="20.35" class="percentage">{{ round($todayPercentage, 2) }}%</text>
                  </svg>
              </div>
          </div>
      </div>
      <div class="chart-container-wrapper">
          <div class="chart-container">
              <div class="chart-info-wrapper">

                  <h2>Total Donations</h2>
                  <span>{{ $totalDonation }}</span>
              </div>
              <div class="chart-svg">
                  <svg viewBox="0 0 36 36" class="circular-chart orange">
                      <path class="circle-bg"
                          d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                      </path>
                      <path class="circle" stroke-dasharray="{{ $donationPercentage }}, 100"
                          d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                      </path>
                      <text x="18" y="20.35" class="percentage">{{ $donationPercentage }}%</text>
                  </svg>
              </div>
          </div>
      </div>
  </div>
