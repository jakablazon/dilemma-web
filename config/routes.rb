Rails.application.routes.draw do
  root 'question#index'
  # For details on the DSL available within this file, see http://guides.rubyonrails.org/routing.html

  post '/vote', to: 'question#vote'
end
