<x-app-layout>
  <!-- Hero Section -->
  <section id="hero">
    <!-- Flex Container -->
    <div class="container flex flex-col-reverse items-center px-6 mx-auto mt-10 space-y-0 md:space-y-0 md:flex-row">
        <!-- Left item -->
        <div class="flex flex-col mb-32 space-y-12 md:w-1/2">
            <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left">
                Welcome! <span class="text-lime-700">{{Auth::user()->lastName}}, {{Auth::user()->firstName}}</span>
            </h1>
            <p class="max-w-sm text-center text-darkGrayishBlue md:text-justify">
              Enhancing Resiliency and Food Security in Adverse Rice Areas in Bicol Region (Component 1) is a 2022 R&D Collaborative Project under Rice Program as to Bicol Region is known for its huge area intended for rice production but also known as highly exposed to all hazards ranging biological, geophysical and hydro-meteorogical.
            </p>
            <div class="flex justify-center md:justify-start">
                <a
                href="{{route('enumerator.form')}}"
                class="p-3 px-6 pt-2 text-white bg-brightRed rounded-full baseline hover:bg-brightRedLight"
                >Go to Forms</a
                >
            </div>
        </div>
        <!-- Image -->
        <div class="md:w-1/2">
            <img src="{{asset('images/masagana ani.png')}}" alt="" />
        </div>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features">
    <!-- Flex container -->
    <div
      class="container flex flex-col px-4 mx-auto mt-10 space-y-12 md:space-y-0 md:flex-row"
    >
      <!-- What's Different -->
      <div class="flex flex-col space-y-12 md:w-1/2">
        <h2 class="max-w-md text-4xl font-semibold text-center md:text-left">
          De Masa et. al, 2019 reported that 42% of the total rice production area in Bicol were prone to flooding, drought and saline intrusion
        </h2>
        <p class="max-w-sm text-center text-darkGrayishBlue md:text-justify">
          These data shows that the rice productivity in Bicol Region is significantly affected by natural calamities. With this huge affected area in region, limited data and information, limited expertise, and access to various decision tools that could help reduce and predict the impact of natural calamities in stress prone area is being aided by this project aiming to develop and establish rice stress prone area information hub and map. 
        </p>
      </div>

      <!-- Numbered List -->
      <div class="flex flex-col space-y-8 md:w-1/2">
        <!-- List Item 1 -->
        <div
          class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row"
        >
          <!-- Heading -->
          <div class="rounded-l-full bg-brightRedSupLight md:bg-transparent">
            <div class="flex items-center space-x-2">
              <div
                class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed"
              >
                01
              </div>
              <h3 class="text-base font-bold md:mb-4 md:hidden">
                Mandate
              </h3>
            </div>
          </div>

          <div>
            <h3 class="hidden mb-4 text-lg font-bold md:block">
              Mandate
            </h3>
            <p class="text-darkGrayishBlue">
              The Department is the government agency responsible for the promotion of agricultural development by providing the policy framework, public investments, and support services needed for domestic and export-oriented business enterprises.
            </p>
          </div>
        </div>

        <!-- List Item 2 -->
        <div
          class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row"
        >
          <!-- Heading -->
          <div class="rounded-l-full bg-brightRedSupLight md:bg-transparent">
            <div class="flex items-center space-x-2">
              <div
                class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed"
              >
                02
              </div>
              <h3 class="text-base font-bold md:mb-4 md:hidden">
                Vision and Mission
              </h3>
            </div>
          </div>

          <div>
            <h3 class="hidden mb-4 text-lg font-bold md:block">
              Vision and Mission
            </h3>
            <p class="text-darkGrayishBlue">
              The DA envisions a food-secure Philippines with prosperous farmers and fishers. It shall collectively empower them and the private sector to increase agricultural productivity and profitability, taking into account sustainable, competitive, and resilient technologies and practices. Hence, its battlecry is simply: “Masaganang Ani at Mataas na Kita!”
            </p>
          </div>
        </div>

        {{-- <!-- List Item 3 -->
        <div
          class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row"
        >
          <!-- Heading -->
          <div class="rounded-l-full bg-brightRedSupLight md:bg-transparent">
            <div class="flex items-center space-x-2">
              <div
                class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed"
              >
                03
              </div>
              <h3 class="text-base font-bold md:mb-4 md:hidden">
                Everything you need in one place
              </h3>
            </div>
          </div>

          <div>
            <h3 class="hidden mb-4 text-lg font-bold md:block">
              Everything you need in one place
            </h3>
            <p class="text-darkGrayishBlue">
              Stop jumping from one service to another to communicate, store
              files, track tasks and share documents. Manage offers an
              all-in-one team productivity solution.
            </p>
          </div>
        </div> --}}

      </div>
    </div>
  </section>
</x-app-layout>
