class QuestionController < ApplicationController
  def index
    @question = Question.first
  end

  def vote
    Question.increment_counter params[:side].to_sym, params[:id]

    render json: {message: 'Thanks for voting, remember to come back tomorrow to vote again!'}
  end
end
